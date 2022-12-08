<?php
spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  if (file_exists($path = './vendor/kurumi/src/Http/' . $class . '.php')) {
    require_once $path;
  } else {
    require_once './app/Controllers/' . $class . '.php';
  }
});

/*
  | harus dibawah bre nyeimpen nya kalau di atas
  | si function spl_autoload_register ngak jalan
 */

require_once "./vendor/kurumi/src/Func/resource.php";
require_once './vendor/kurumi/src/Handling/loads.php';
require_once './vendor/kurumi/src/Func/view.php';
require_once './routes/web.php';
