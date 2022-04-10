<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Akukoder\FortifyTablerAdmin\Commands\Traits\ChangeLayoutTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\IntroTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\QuestionTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\SearchAndReplaceTrait;
use Illuminate\Console\Command;

class ChangeLayoutCommand extends Command
{
    use ChangeLayoutTrait, QuestionTrait, SearchAndReplaceTrait, IntroTrait;

    public $signature = 'fortify:layout';

    public $description = 'Change layout in view files.';

    public function handle()
    {
        $this->showIntro();

        list($layout, $position, $combine, $style, $sticky) = $this->askQuestions();

        $this->changeLayoutInViews($layout, $position, $combine, $style, $sticky);

        $this->callSilent('optimize:clear');

        $this->line('');
        $this->comment('Layout changed!');
    }
}
