<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Untuk menentukan jalur path,
| @params 1 path (jalur)
| @params 2 callback secara default callback berupa function,
|          anonymous,
|          tapi disarankan menggunakan class, supaya memisahkan logic nya 
|          antara Routing, View, dan Models (MVC)
|
|          CONTOH 
|          Route::get('/', [PageControllers::class, 'home'])
|
 */

Route::get('/', [HomeController::class, 'home']);

Route::run();
