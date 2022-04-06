<?php

namespace Akukoder\FortifyTablerAdmin;

use Akukoder\FortifyTablerAdmin\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class FortifyTablerAdminServiceProvider extends ServiceProvider
{
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
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
            ], 'tabler-resources');

            // Update public files
            $this->publishes([
                __DIR__ . '/../stubs/public/tabler' => base_path('public/tabler'),
                __DIR__ . '/../stubs/public/dist' => base_path('public/dist'),
                __DIR__ . '/../stubs/public/static' => base_path('public/static'),
            ], 'tabler-public');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
