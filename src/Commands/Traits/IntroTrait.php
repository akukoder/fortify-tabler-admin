<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

trait IntroTrait
{
    protected $char = '*';
    protected function showIntro($commandName = null)
    {
        $this->line('');
        $this->comment(str_repeat($this->char, 80));
        $this->comment(str_repeat(' ', 30).'Fortify Tabler Admin');
        $this->info(str_repeat(' ', 25).'akukoder/fortify-tabler-admin');

        if (!is_null($commandName)) {
            $length = strlen($commandName);
            $repeat = (80 - $length) / 2;
            $this->info(str_repeat(' ', $repeat).$commandName);
        }

        $this->comment(str_repeat($this->char, 80));
        $this->line('');
    }
}
