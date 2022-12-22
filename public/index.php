<?php

/*
|--------------------------------------------------------------------------
| Register Shutdown Functions 
|--------------------------------------------------------------------------
|
| Untuk menonaktifkan pesan error bawaan php, dan membuat nya yang baru 
| (Costume Error)
|
 */

require __DIR__ . "/../vendor/kurumi/src/Shutdown/Err_reporting.php";

new \Kurumi\Shutdown\Err_reporting();



/*
|--------------------------------------------------------------------------
| autoload Classs dan function
|--------------------------------------------------------------------------
|
| Untuk mengload class yang berada dalam folder vendor/src 
| 
*/

require __DIR__ . "/../vendor/autoload.php";
