<?php

namespace Akukoder\FortifyTablerAdmin;

use Akukoder\FortifyTablerAdmin\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class FortifyTablerAdminServiceProvider extends ServiceProvider
{
    const STUB_DIR = __DIR__.'/../stubs';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::STUB_DIR.'/resources/views' => base_path('resources/views'),
            ], 'tabler-resources');

            // Update public files
            $this->publishes([
                self::STUB_DIR.'/public/css' => base_path('public/css'),
                self::STUB_DIR.'/public/js' => base_path('public/js'),
                self::STUB_DIR.'/public/static' => base_path('public/static'),
            ], 'tabler-public');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
