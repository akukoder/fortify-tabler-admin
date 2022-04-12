<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Akukoder\FortifyTablerAdmin\Commands\Traits\IntroTrait;
use Akukoder\FortifyTablerAdmin\Commands\Traits\SearchAndReplaceTrait;
use Akukoder\FortifyTablerAdmin\Config;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateViewCommand extends Command
{
    use IntroTrait;
    use SearchAndReplaceTrait;

    public $signature = 'fortify:view';

    public $description = 'Create new view based on Tabler example pages.';

    const STUB_DIR = __DIR__.'/../../stubs';

    public function handle()
    {
        $this->showIntro();

        // Get which layout has been use currently from dashboard view
        $layout = (new Config())->get('layout', 'horizontal');

        $tag = 'x-layouts.'.$layout;

        $examples = File::allFiles(self::STUB_DIR.'/examples');

        $choices = [];

        foreach ($examples as $example) {
            $path = explode('/', $example);

            $choices[] = str_replace('.stub', '', $path[count($path) - 1]);
        }

        $view = $this->choice(
            'Choose page to generate',
            $choices,
            0,
        );

        $folder = $this->ask(
            'Enter file location, must be inside /resources/views folder',
            null
        );

        if (!is_null($folder) AND !File::isDirectory(resource_path('views/'.$folder))) {
            File::makeDirectory(resource_path('views/'.$folder));
            $filename = resource_path('views/'.$folder.'/'.$view.'.blade.php');
        } else {
            $filename = resource_path('views/'.$view.'.blade.php');
        }

        if (File::exists($filename)) {
            if (!$this->confirm('File already exists, do you wish to overwrite?')) {
                $this->comment('Operation canceled!');
                exit;
            }
        }

        File::copy(self::STUB_DIR.'/examples/'.$view.'.stub', $filename);

        $this->replaceInFile('[[LAYOUT]]', $tag, $filename);

        $this->callSilent('optimize:clear');

        $this->line('');
        $this->comment('View created!');
    }
}
