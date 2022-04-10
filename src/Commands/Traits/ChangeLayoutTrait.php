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
                $this->replaceInFile('<x-navbar-logo-white />', '<x-navbar-logo />', resource_path('views/components/vertical/aside.blade.php'));
                $this->replaceInFile('flex-grow-0 bg-light text-dark rounded', 'flex-grow-0 bg-dark-lt text-light rounded', resource_path('views/components/vertical/aside.blade.php'));
                break;

            case 'vertical':
                $tag = 'x-layouts.vertical';
                $this->replaceInFile('navbar-transparent', 'navbar-dark', resource_path('views/components/vertical/aside.blade.php'));
                $this->replaceInFile('<x-navbar-logo />', '<x-navbar-logo-white />', resource_path('views/components/vertical/aside.blade.php'));
                $this->replaceInFile('flex-grow-0 bg-dark-lt text-light rounded', 'flex-grow-0 bg-light text-dark rounded', resource_path('views/components/vertical/aside.blade.php'));
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
