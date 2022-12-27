<?php

spl_autoload_register(function ($class) {
    $class = explode('\\', $class);
    $class = @$class[1] . '/' . end($class);
    if (file_exists($path = __DIR__ . '/src/' . $class . '.php')) {
        require $path;
    }
});

require __DIR__ . '/src/Functions/view.php';
require __DIR__ . '/src/Functions/redirect.php';
