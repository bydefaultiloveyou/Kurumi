<?php

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = __DIR__ . '/kurumi/src/' . $class . '.php')) {
    require_once $path;
  }
});

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = __DIR__ . '/../app/' . $class . '.php')) {
    require_once $path;
  }
});

require_once __DIR__ . '/kurumi/src/Functions/view.php';
require_once __DIR__ . '/kurumi/src/Functions/asset.php';
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../config/view.php';
