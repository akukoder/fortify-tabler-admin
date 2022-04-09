<?php

namespace App\Listeners;

use App\Actions\UserSettings;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoadUserSettings
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        settings()->setExtraColumns([
            'user_id' => auth()->user()->id
        ]);

        if (! settings()->has('user_theme')) {
            (new UserSettings)->set('user_theme', 'theme-light');
        }
    }
}
