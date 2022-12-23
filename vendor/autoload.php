<?php

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = __DIR__ . '/kurumi/src/' . $class . '.php')) {
    require $path;
  }
});

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = __DIR__ . '/../app/' . $class . '.php')) {
    require $path;
  }
});

require __DIR__ . '/kurumi/src/Functions/view.php';
require __DIR__ . '/kurumi/src/Functions/redirect.php';
require __DIR__ . '/../routes/web.php';
