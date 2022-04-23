<?php

namespace App\View\Components\Traits;

trait UserTheme
{
    public function getUserTheme()
    {
        if (auth()->check()) {
            return auth()->user()->settings('user_theme', 'theme-light');
        }

        return 'theme-light';
    }
}
