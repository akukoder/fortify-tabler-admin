<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

use Illuminate\Support\Facades\File;
use function resource_path;

trait ChangeLayoutTrait
{
    protected function changeLayoutInViews($layout)
    {
        $folders = [
            resource_path('views'),
            resource_path('views/profile'),
            resource_path('views/users'),
        ];

        $tagToFind = [
            '[[LAYOUT]]',
            'x-layouts.horizontal',
            'x-layouts.overlap',
            'x-layouts.vertical',
        ];

        switch ($layout) {
            case 'vertical-transparent':
                $tag = 'x-layouts.vertical';
                $this->replaceInFile('navbar-dark', 'navbar-transparent', resource_path('views/components/vertical/aside.blade.php'));
                break;

            default:
                $tag = 'x-layouts.'.$layout;
        }


        foreach ($folders as $folder) {
            foreach (File::allFiles($folder) as $file) {
                foreach ($tagToFind as $item) {
                    $this->replaceInFile($item, $tag, $file);
                }
            }
        }
    }
}
