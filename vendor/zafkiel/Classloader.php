<?php

namespace zafkiel;

class Classloader
{
    private $dependencies;

    public function __construct()
    {
        $this->dependencies = require __DIR__ . "/../../zafkiel.php";
    }

    public function Intialize()
    {
        // looping semua dependensi
        spl_autoload_register(function ($class) {

            // pisah string untuk menghapus array index 0
            $exClass = explode("\\", $class);
            unset($exClass[0]);

            // looping semua directory
            foreach ($this->dependencies as $namespace => $folder) {
                $file = __DIR__ . "/../../" . $folder . implode("/", $exClass) . ".php";

                // dan require jika class nya ada
                if (file_exists($file)) {
                    require $file;
                    return;
                }
            }
        });
    }
}
