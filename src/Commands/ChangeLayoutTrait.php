<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Illuminate\Support\Facades\File;

trait ChangeLayoutTrait
{
    protected function changeLayoutInViews($layout)
    {
        $folders = [
            resource_path('views'),
            resource_path('views/profile'),
            resource_path('views/users'),
        ];

        $layoutTags = [
            '[[LAYOUT]]',
            'x-layouts.horizontal',
            'x-layouts.overlap',
            'x-layouts.vertical',
        ];

        $tag = 'x-layouts.'.$layout;

        foreach ($folders as $folder) {
            foreach (File::allFiles($folder) as $file) {
                foreach ($layoutTags as $item) {
                    $this->replaceInFile($item, $tag, $file);
                }
            }
        }
    }
}
