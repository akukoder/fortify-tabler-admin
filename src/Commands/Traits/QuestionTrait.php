<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

trait QuestionTrait
{
    public function askQuestions()
    {
        $position = null;
        $style = null;
        $sticky = null;

        $layout = $this->choice(
            'Choose layout',
            ['horizontal', 'overlap', 'vertical'],
            0,
        );

        switch ($layout) {
            case 'vertical':
                $position = $this->choice(
                    'Choose sidebar position',
                    ['left', 'right'],
                    0,
                );

                $style = $this->choice(
                    'Choose sidebar styling',
                    ['light', 'dark', 'transparent'],
                    0,
                );
                break;

            case 'horizontal':
                $style = $this->choice(
                    'Choose navbar styling',
                    ['light', 'dark'],
                    0,
                );

                $sticky = $this->choice(
                    'Set it to sticky?',
                    ['no', 'yes'],
                    0,
                );
                break;

            default:
        }

        return [
            $layout, $position, $style, $sticky
        ];
    }
}
