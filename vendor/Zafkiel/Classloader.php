<?php

namespace Zafkiel;

class Classloader
{

    private static $directory, $directories;

    public static function initialize()
    {
        self::$directories =
            require __DIR__ . "/autoload-psr4.php";

        spl_autoload_register(function ($classname) {
            $classname = explode("\\", $classname);
            unset($classname[0]);
            foreach (self::$directories as $directory) {
                self::$directory = $directory;
                if (file_exists(__DIR__ . "/../../" . self::$directory . implode("/", $classname) . ".php")) {
                    require __DIR__ . "/../../" . self::$directory . implode("/", $classname) . ".php";
                }
            }
        });
    }
}
