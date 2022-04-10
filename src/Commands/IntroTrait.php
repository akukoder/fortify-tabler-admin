<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

trait IntroTrait
{
    protected $char = '*';
    protected function showIntro()
    {
        $this->line('');
        $this->comment(str_repeat($this->char, 80));
        $this->comment(str_repeat(' ', 30).'Fortify Tabler Admin');
        $this->info(str_repeat(' ', 25).'akukoder/fortify-tabler-admin');
        $this->comment(str_repeat($this->char, 80));
        $this->line('');
    }
}
