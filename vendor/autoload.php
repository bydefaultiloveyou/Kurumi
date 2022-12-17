<?php

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = './vendor/kurumi/src/' . $class . '.php')) {
    require $path;
  }
});

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = './app/' . $class . '.php')) {
    require $path;
  }
});

require './vendor/kurumi/src/Functions/view.php';
require './routes/web.php';
