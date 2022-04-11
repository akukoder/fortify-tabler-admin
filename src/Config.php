<?php

namespace Akukoder\FortifyTablerAdmin;

use Illuminate\Support\Facades\File;

class Config
{
    protected $file;

    public function __construct()
    {
        $this->file = storage_path('app/fortify-tabler-admin.json');

        if (!File::exists($this->file)) {
            touch($this->file);
        }
    }

    public function get($key, $default = null)
    {
        $config = $this->load();

        if (array_key_exists($key, $config)) {
            return $config[$key];
        }

        return $default;
    }

    public function set($key, $value)
    {
        $config = $this->load();

        if (is_array($config) AND array_key_exists($key, $config)) {
            $config[$key] = $value;
        }
        else {
            $config = array_merge($config, [
                $key => $value
            ]);
        }

        File::put($this->file, $this->encode($config));
    }

    private function load()
    {
        $content = file_get_contents($this->file);

        if (empty($content)) {
            $content = $this->encode([]);
        }

        return $this->decode($content);
    }

    private function encode($string)
    {
        return json_encode($string);
    }

    private function decode($json)
    {
        return json_decode($json, true);
    }
}
