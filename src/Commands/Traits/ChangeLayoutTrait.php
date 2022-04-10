<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

use Illuminate\Support\Facades\File;
use function resource_path;

trait ChangeLayoutTrait
{
    protected $navbarBase = 'navbar navbar-vertical navbar-expand-lg';

    protected function changeLayoutInViews($layout, $position = null, $style = null, $sticky = null)
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

        $tag = 'x-layouts.'.$layout;

        foreach ($folders as $folder) {
            foreach (File::allFiles($folder) as $file) {
                foreach ($tagToFind as $item) {
                    $this->replaceInFile($item, $tag, $file);
                }
            }
        }

        switch ($layout) {
            case 'vertical':
                $this->setSidebarPosition($position);
                $this->setSidebarStyle($style);
                break;

            case 'horizontal':
                $this->setHeaderStyle($style);
                $this->setHeaderSticky($sticky);
                break;
        }
    }

    /**
     * Set header styling
     *
     * @param $style
     * @return void
     */
    private function setHeaderStyle($style)
    {
        switch ($style) {
            case 'dark':
                $this->replaceInFile(
                    'navbar-light',
                    'navbar-dark',
                    resource_path('views/components/header.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar-logo />',
                    '<x-navbar-logo-white />',
                    resource_path('views/components/header.blade.php')
                );
                break;

            case 'light':
                $this->replaceInFile(
                    'navbar-dark',
                    'navbar-light',
                    resource_path('views/components/header.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar-logo-white />',
                    '<x-navbar-logo />',
                    resource_path('views/components/header.blade.php')
                );
                break;
        }
    }

    /**
     * Set header styling
     *
     * @param $style
     * @return void
     */
    private function setHeaderSticky($sticky)
    {
        switch ($sticky) {
            case 'yes':
                $this->replaceInFile(
                    'navbar navbar-expand-md',
                    'navbar navbar-expand-md sticky-top',
                    resource_path('views/components/header.blade.php')
                );

                $this->replaceInFile(
                    '<x-header />',
                    '<div class="sticky-top"><x-header />',
                    resource_path('views/layouts/horizontal.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar />',
                    '<x-navbar /></div><!-- /.sticky-top -->',
                    resource_path('views/layouts/horizontal.blade.php')
                );
                break;

            case 'no':
                $this->replaceInFile(
                    ' sticky-top',
                    '',
                    resource_path('views/components/header.blade.php')
                );

                $this->replaceInFile(
                    '<div class="sticky-top"><x-header />',
                    '<x-header />',
                    resource_path('views/layouts/horizontal.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar /></div><!-- /.sticky-top -->',
                    '<x-navbar />',
                    resource_path('views/layouts/horizontal.blade.php')
                );
                break;
        }
    }

    /**
     * Set sidebar styling
     *
     * @param $style
     * @return void
     */
    private function setSidebarStyle($style)
    {
        switch ($style) {
            case 'dark':
                $this->replaceInFile(
                    'navbar-light',
                    'navbar-dark',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    'navbar-transparent',
                    'navbar-dark',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar-logo />',
                    '<x-navbar-logo-white />',
                    resource_path('views/components/vertical/aside.blade.php')
                );
                break;

            case 'light':
                $this->replaceInFile(
                    'navbar-dark',
                    'navbar-light',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    'navbar-transparent',
                    'navbar-light',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar-logo-white />',
                    '<x-navbar-logo />',
                    resource_path('views/components/vertical/aside.blade.php')
                );
                break;

            case 'transparent':
                $this->replaceInFile(
                    'navbar-dark',
                    'navbar-transparent',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    'navbar-light',
                    'navbar-transparent',
                    resource_path('views/components/vertical/aside.blade.php')
                );

                $this->replaceInFile(
                    '<x-navbar-logo-white />',
                    '<x-navbar-logo />',
                    resource_path('views/components/vertical/aside.blade.php')
                );
                break;
        }
    }

    /**
     * Set sidebar position
     *
     * @param $position
     * @return void
     */
    private function setSidebarPosition($position)
    {
        switch ($position) {
            case 'left':
                $this->replaceInFile(
                    'navbar-vertical navbar-right navbar-expand-lg',
                    'navbar-vertical navbar-expand-lg',
                    resource_path('views/components/vertical/aside.blade.php')
                );
                break;

            case 'right':
                $this->replaceInFile(
                    'navbar-vertical navbar-expand-lg',
                    'navbar-vertical navbar-right navbar-expand-lg',
                    resource_path('views/components/vertical/aside.blade.php')
                );
                break;
        }
    }
}
