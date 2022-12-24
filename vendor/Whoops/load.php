<?php

$config = require __DIR__ . "/../../config/handler.php";

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  if (file_exists($path = __DIR__ . '/' . $class . '.php')) {
    require $path;
  } else if (file_exists($path = __DIR__ . '/Util/' . $class . '.php')) {
    require $path;
  } else if (file_exists($path = __DIR__ . '/Handler/' . $class . '.php')) {
    require $path;
  } else if (file_exists($path = __DIR__ . '/Exception/' . $class . '.php')) {
    require $path;
  }
});

if ($config["enable"]) {
  $whoops = new \Whoops\Run;
  $mode = "\Whoops\Handler\\" . $config["mode"];
  $whoops->pushHandler(new $mode);
  $whoops->register();
}
