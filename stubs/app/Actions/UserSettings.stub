<?php

namespace App\Actions;

class UserSettings
{
    public function set($key, $value)
    {
        settings()->setExtraColumns(['user_id' => auth()->user()->id]);
        settings()->set($key, $value);
        settings()->save();
    }
}
