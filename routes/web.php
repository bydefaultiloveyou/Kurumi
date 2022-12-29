<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
| Untuk menentukan jalur path
| @param string $path (jalur)
| @param mixed $callback
| secara default callback berupa function anonymous,
| tapi disarankan menggunakan class, supaya memisahkan logic nya 
| antara Routing, View, dan Models (MVC)
| CONTOH 
| Route::get('/', [PageControllers::class, 'home'])
 */

Route::get('/', [HomeController::class, 'home']);

Route::run();
