<?php

namespace App\Lib;

class Data 
{
    private $folder = '';

    public function __construct($folder)
    {
        $this->folder = $folder;
    }

    public function get($key)
    {
        $file = $this->folder."/{$key}.json";

        return json_decode(file_get_contents($file), true);
    }

    public function save($key, array $data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);

        $file = $this->folder."/{$key}.json";

        file_put_contents($file, $json);
    }
}
