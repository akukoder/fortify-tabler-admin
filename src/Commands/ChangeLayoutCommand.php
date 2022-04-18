<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Akukoder\FortifyTablerAdmin\Commands\Traits\ChangeLayoutTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\IntroTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\QuestionTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\SearchAndReplaceTrait;
use Akukoder\FortifyTablerAdmin\Config;
use Illuminate\Console\Command;

class ChangeLayoutCommand extends Command
{
    use ChangeLayoutTrait;
    use IntroTrait;
    use QuestionTrait;
    use SearchAndReplaceTrait;

    public $signature = 'fortify:layout';

    public $description = 'Change layout in view files.';

    public function handle()
    {
        $this->showIntro('Change Layout');

        list($layout, $position, $combine, $style, $sticky, $vheader) = $this->askQuestions();

        // Save data to config
        (new Config())->set('layout', $layout);
        (new Config())->set('position', $position);
        (new Config())->set('combine', $combine);
        (new Config())->set('style', $style);
        (new Config())->set('sticky', $sticky);
        (new Config())->set('vheader', $vheader);

        $this->changeLayoutInViews($layout, $position, $combine, $style, $sticky, $vheader);

        $this->callSilent('optimize:clear');

        $this->line('');
        $this->comment('Layout changed!');
    }
}
