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

//            $this->publishes([
//                self::STUB_DIR.'/resources/lang' => base_path('resources/lang'),
//            ], 'tabler-language');

            // Update public files
            $this->publishes([
                self::STUB_DIR.'/public/tabler' => base_path('public/tabler'),
                self::STUB_DIR.'/public/dist' => base_path('public/dist'),
                self::STUB_DIR.'/public/static' => base_path('public/static'),
            ], 'tabler-public');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
