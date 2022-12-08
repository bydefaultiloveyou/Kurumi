<?php
spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  if (file_exists('./vendor/Kurumi/Src/Http/' . $class . '.php')) {
    require_once './vendor/Kurumi/Src/Http/' . $class . '.php';
  } else {
    require_once './app/Controllers/' . $class . '.php';
  }
});

/*
  | harus dibawah bre nyeimpen nya kalau di atas
  | si function spl_autoload_register ngak jalan
 */

require_once "./vendor/kurumi/Func/resource.php";
require_once './vendor/kurumi/Src/Handling/loads.php';
require_once './vendor/kurumi/Func/view.php';
require_once './routes/web.php';
