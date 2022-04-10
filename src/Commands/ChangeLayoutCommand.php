<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Illuminate\Console\Command;

class ChangeLayoutCommand extends Command
{
    use ChangeLayoutTrait, SearchAndReplaceTrait, IntroTrait;

    public $signature = 'fortify:layout';

    public $description = 'Change layout in view files.';

    public function handle()
    {
        $this->showIntro();

        $layout = $this->choice(
            'Which do layout you wish to use?',
            ['horizontal', 'overlap', 'vertical'],
            0,
        );

        $this->changeLayoutInViews($layout);

        $this->callSilent('optimize:clear');

        $this->line('');
        $this->comment('Layout changed!');
    }
}
