<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class InstallCommand extends Command
{
    public $signature = 'tabler:install';

    public $description = 'Install Fortify Tabler Admin preset, with views, resources and some other features.';

    const STUB_DIR = __DIR__.'/../../stubs';

    public function handle()
    {
        if (! $this->confirm('This package will replace some of your laravel files. Do you wish to continue?', true)) {
            $this->info('Bye...');
        }

        try {
            $this->callSilent('fortify:ui', ['--skip-provider' => true]);

            $this->info('Fortify UI has been installed. Proceeding to install Fortify Tabler Admin.');

            $this->publishAssets();
            $this->updateProvider();
            $this->updateConfig();
            $this->updateRoutes();
            $this->addControllers();
            $this->addActions();
            $this->addViews();
            $this->updateUserModel();
            $this->updateSessionDriver();

            $this->callSilent('storage:link');
            $this->callSilent('migrate');
            $this->callSilent('optimize:clear');

            $this->line('');
            $this->comment('Fortify Tabler Admin installation completed!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $this->error('Database not exists! Please create database for your application before proceeding.');
        }
    }

    protected function addControllers()
    {
        File::copy(self::STUB_DIR.'/app/Http/Controllers/ProfileController.stub', app_path('Http/Controllers/ProfileController.php'));
        File::copy(self::STUB_DIR.'/app/Http/Controllers/UsersController.stub', app_path('Http/Controllers/UsersController.php'));
    }

    protected function addActions()
    {
        File::copy(self::STUB_DIR.'/app/Actions/Fortify/ChangeUserPassword.stub', app_path('Actions/Fortify/ChangeUserPassword.php'));
    }

    protected function addViews()
    {
        if (! File::isDirectory(app_path('View'))) {
            File::makeDirectory(app_path('View'));
            File::makeDirectory(app_path('View/Components'));
            File::makeDirectory(app_path('View/Components/Layouts'));
        }

        File::copy(self::STUB_DIR.'/app/View/Components/Layouts/Auth.stub', app_path('View/Components/Layouts/Auth.php'));
        File::copy(self::STUB_DIR.'/app/View/Components/Layouts/Dashboard.stub', app_path('View/Components/Layouts/Dashboard.php'));
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-resources', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-public', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-language', '--force' => true]);

        File::deleteDirectory(resource_path('css'));

        File::delete(resource_path('lang/en/auth.php'));
        File::copy(self::STUB_DIR.'/resources/lang/en/auth.stub', resource_path('lang/en/auth.php'));
    }

    protected function updateProvider()
    {
        File::delete(app_path('Providers/FortifyServiceProvider.php'));
        File::copy(self::STUB_DIR.'/app/Providers/FortifyServiceProvider.stub', app_path('Providers/FortifyServiceProvider.php'));

        File::delete(app_path('Providers/AppServiceProvider.php'));
        File::copy(self::STUB_DIR.'/app/Providers/AppServiceProvider.stub', app_path('Providers/AppServiceProvider.php'));
    }

    protected function updateConfig()
    {
        File::delete(config_path('fortify.php'));
        File::copy(self::STUB_DIR.'/config/fortify.stub', config_path('fortify.php'));
    }

    protected function updateRoutes()
    {
        File::delete(base_path('routes/web.php'));
        File::copy(self::STUB_DIR.'/routes/web.stub', base_path('routes/web.php'));
    }

    protected function updateSessionDriver()
    {
        // request information on session driver
        if (! Schema::hasTable('sessions')){
            $this->callSilent('session:table');

            $this->replaceInFile(
                "SESSION_DRIVER=file".PHP_EOL,
                "SESSION_DRIVER=database".PHP_EOL,
                base_path('.env')
            );
        }
    }

    protected function updateUserModel()
    {
        $this->replaceInFile(
            "class User extends Authenticatable".PHP_EOL,
            "class User extends Authenticatable implements MustVerifyEmail".PHP_EOL,
            app_path('Models/User.php')
        );

        $this->replaceInFile(
            "use HasFactory, Notifiable;".PHP_EOL,
            "use HasFactory, Notifiable, TwoFactorAuthenticatable;".PHP_EOL,
            app_path('Models/User.php')
        );

        $content = file_get_contents(app_path('Models/User.php'));

        if (strpos($content, 'Laravel\Fortify\TwoFactorAuthenticatable') === false) {
            $this->replaceInFile(
                "use Illuminate\Notifications\Notifiable;".PHP_EOL,
                "use Illuminate\Notifications\Notifiable;\nuse Laravel\Fortify\TwoFactorAuthenticatable;".PHP_EOL,
                app_path('Models/User.php')
            );
        }
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
