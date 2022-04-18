<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

trait QuestionTrait
{
    public function askQuestions()
    {
        $position = 0;
        $combine = 0;
        $style = 0;
        $sticky = 0;
        $vheader = 0;

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

                $vheader = $this->choice(
                    'Do you want to add header as well?',
                    ['no', 'yes'],
                    1,
                );
                break;

            case 'horizontal':
                $combine = $this->choice(
                    'Do you want to combine header and navbar?',
                    ['no', 'yes'],
                    0,
                );

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
            $layout, $position, $combine, $style, $sticky, $vheader,
        ];
    }
}
