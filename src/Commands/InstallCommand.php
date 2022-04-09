<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class InstallCommand extends Command
{
    public $signature = 'fortify:tabler';

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
            $this->addRules();
            $this->addEvents();
            $this->addActions();
            $this->addMigrations();
            $this->addViews();
            $this->updateUserModel();
            $this->updateSessionDriver();

            $this->call('storage:link');
            $this->call('migrate');
            $this->call('optimize:clear');

            $this->line('');
            $this->comment('Fortify Tabler Admin installation completed!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $this->error('Database not exists! Please create database for your application before proceeding.');
        }
    }

    protected function addControllers()
    {
        if (! File::isDirectory(app_path('Http/Helpers'))) {
            File::makeDirectory(app_path('Http/Helpers'));
        }

        File::copy(self::STUB_DIR.'/app/Http/Helpers/StrHelper.stub', app_path('Http/Helpers/StrHelper.php'));
        File::copy(self::STUB_DIR.'/app/Http/Controllers/ProfileController.stub', app_path('Http/Controllers/ProfileController.php'));
        File::copy(self::STUB_DIR.'/app/Http/Controllers/UsersController.stub', app_path('Http/Controllers/UsersController.php'));
    }

    protected function addEvents()
    {
        if (! File::isDirectory(app_path('Listeners'))) {
            File::makeDirectory(app_path('Listeners'));
        }

        File::copy(self::STUB_DIR.'/app/Listeners/LoadUserSettings.stub', app_path('Listeners/LoadUserSettings.php'));
    }

    protected function addRules()
    {
        if (! File::isDirectory(app_path('Rules'))) {
            File::makeDirectory(app_path('Rules'));
        }

        File::copy(self::STUB_DIR.'/app/Rules/Username.stub', app_path('Rules/Username.php'));
    }

    protected function addActions()
    {
        File::delete(app_path('Actions/Fortify/CreateNewUser.php'));
        File::copy(self::STUB_DIR.'/app/Actions/Fortify/CreateNewUser.stub', app_path('Actions/Fortify/CreateNewUser.php'));

        File::delete(app_path('Actions/Fortify/ChangeUserPassword.php'));
        File::copy(self::STUB_DIR.'/app/Actions/Fortify/ChangeUserPassword.stub', app_path('Actions/Fortify/ChangeUserPassword.php'));

        File::delete(app_path('Actions/Fortify/UpdateUserProfileInformation.php'));
        File::copy(self::STUB_DIR.'/app/Actions/Fortify/UpdateUserProfileInformation.stub', app_path('Actions/Fortify/UpdateUserProfileInformation.php'));

        File::copy(self::STUB_DIR.'/app/Actions/UserAvatar.stub', app_path('Actions/UserAvatar.php'));
        File::copy(self::STUB_DIR.'/app/Actions/UserSettings.stub', app_path('Actions/UserSettings.php'));
        File::copy(self::STUB_DIR.'/app/Actions/UsernameValidationRules.stub', app_path('Actions/UsernameValidationRules.php'));
    }

    protected function addMigrations()
    {
        File::delete(base_path('database/factories/UserFactory.php'));
        File::copy(self::STUB_DIR.'/database/factories/UserFactory.stub', base_path('database/factories/UserFactory.php'));
        File::copy(self::STUB_DIR.'/database/migrations/2020_12_13_155612_update_users_table.stub', base_path('database/migrations/2020_12_13_155612_update_users_table.php'));
    }

    protected function addViews()
    {
        if (! File::isDirectory(app_path('View'))) {
            File::makeDirectory(app_path('View'));
            File::makeDirectory(app_path('View/Components'));
            File::makeDirectory(app_path('View/Components/Layouts'));
        }

        File::copy(self::STUB_DIR.'/app/View/Components/Layouts/Auth.stub', app_path('View/Components/Layouts/Auth.php'));
        File::copy(self::STUB_DIR.'/app/View/Components/Layouts/Horizontal.stub', app_path('View/Components/Layouts/Horizontal.php'));
        File::copy(self::STUB_DIR.'/app/View/Components/Layouts/Overlap.stub', app_path('View/Components/Layouts/Overlap.php'));
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-resources', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-public', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'tabler-language', '--force' => true]);
        $this->callSilent('vendor:publish', ['--provider' => 'Arcanedev\LaravelSettings\SettingsServiceProvider', '--force' => true]);

        File::delete(resource_path('lang/en/auth.php'));

        File::delete(resource_path('js/app.js'));
        File::delete(base_path('webpack.mix.js'));
        File::delete(base_path('package.json'));
        File::delete(base_path('package-lock.json'));

        File::copy(self::STUB_DIR.'/resources/lang/en/auth.stub', resource_path('lang/en/auth.php'));
        File::copy(self::STUB_DIR.'/resources/lang/en/profile.stub', resource_path('lang/en/profile.php'));
        File::copy(self::STUB_DIR.'/resources/lang/en/users.stub', resource_path('lang/en/users.php'));

        File::copyDirectory(self::STUB_DIR.'/resources/tabler', resource_path('tabler'));
        File::copy(self::STUB_DIR.'/webpack.mix.stub', base_path('webpack.mix.js'));
        File::copy(self::STUB_DIR.'/package.stub', base_path('package.json'));
        File::copy(self::STUB_DIR.'/resources/js/app.stub', resource_path('js/app.js'));
        File::copy(self::STUB_DIR.'/public/mix-manifest.stub', public_path('mix-manifest.json'));

        if (! File::isDirectory(resource_path('sass'))) {
            File::makeDirectory(resource_path('sass'));
        }

        File::copy(self::STUB_DIR.'/resources/sass/app.stub', resource_path('sass/app.scss'));
    }

    protected function updateProvider()
    {
        File::delete(app_path('Providers/FortifyServiceProvider.php'));
        File::copy(self::STUB_DIR.'/app/Providers/FortifyServiceProvider.stub', app_path('Providers/FortifyServiceProvider.php'));

        File::delete(app_path('Providers/AppServiceProvider.php'));
        File::copy(self::STUB_DIR.'/app/Providers/AppServiceProvider.stub', app_path('Providers/AppServiceProvider.php'));

        File::delete(app_path('Providers/EventServiceProvider.php'));
        File::copy(self::STUB_DIR.'/app/Providers/EventServiceProvider.stub', app_path('Providers/EventServiceProvider.php'));
    }

    protected function updateConfig()
    {
        File::delete(config_path('fortify.php'));
        File::copy(self::STUB_DIR.'/config/fortify.stub', config_path('fortify.php'));
        File::copy(self::STUB_DIR.'/config/avatar.stub', config_path('avatar.php'));
        File::copy(self::STUB_DIR.'/config/settings.stub', config_path('settings.php'));
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

            $this->replaceInFile(
                "SESSION_DRIVER=file".PHP_EOL,
                "SESSION_DRIVER=database".PHP_EOL,
                base_path('.env.example')
            );
        }
    }

    protected function updateUserModel()
    {
        File::delete(app_path('Models/User.php'));
        File::copy(self::STUB_DIR.'/app/Models/User.stub', app_path('Models/User.php'));
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
