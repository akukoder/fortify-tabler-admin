<?php

namespace Akukoder\FortifyTablerAdmin\Commands\Traits;

trait SearchAndReplaceTrait
{
    /**
     * Replace a given string within a given file.
     *
     * @param string $search
     * @param string $replace
     * @param string $path
     *
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
