<?php
spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  if (file_exists('./vendor/kurumi/src/http/' . $class . '.php')) {
    require_once './vendor/kurumi/src/http/' . $class . '.php';
  } else {
    require_once './app/Controllers/' . $class . '.php';
  }
});

/*
  | harus dibawah bre nyeimpen nya kalau di atas
  | si function spl_autoload_register ngak jalan
 */

require_once "./vendor/kurumi/func/resource.php";
require_once './vendor/kurumi/src/handling/loads.php';
require_once './vendor/kurumi/func/view.php';
require_once './routes/web.php';
