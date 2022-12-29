<?php
/*
|--------------------------------------------------------------------------
| Autoload class whoops 
|--------------------------------------------------------------------------
|
| Untuk mengload seluruh class whoops
| 
*/

require __DIR__ . "/Whoops/load.php";

/*
|--------------------------------------------------------------------------
| autoload Classs dan function
|--------------------------------------------------------------------------
|
| Untuk mengload class yang berada dalam folder vendor/src 
| 
*/


require __DIR__ . "/kurumi/load.php";


spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = @$class[1] . '/' . end($class);
  if (file_exists($path = __DIR__ . '/../app/' . $class . '.php')) {
    require $path;
  }
});

require __DIR__ . '/../routes/web.php';
