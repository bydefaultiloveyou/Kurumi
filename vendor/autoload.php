<?php

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = $class[1] . '/' . end($class);
  if (file_exists($path = './vendor/kurumi/src/' . $class . '.php')) {
    require_once $path;
  }
});

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = $class[1] . '/' . end($class);
  require_once './app/' . $class . '.php';
});


require_once './vendor/kurumi/src/Kurumi/Kurumi.php';
require_once "./vendor/kurumi/src/Func/resource.php";
require_once './vendor/kurumi/src/Func/view.php';
require_once './routes/web.php';
