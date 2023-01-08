<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
|
|  Pengaturan rute dan handler
|
|  => rute, url yang dimasukkan pada browser
|     contoh:
|             - '/'         - '/page'
|             - '/about'    - '/user'
|
|  => handler, dapat berupa fungsi biasa,
|     fungsi anonim atau controller
|     contoh:
|             - function(){}
|             - [Controller::class, 'method']
|
|   contoh lengkap:
|                 - Route::get('/', [PageController::class, 'home'])
|                 - Route::get('/about', [HomeController::class, 'about'])
|
 */


Route::get('/', [HomeController::class, 'home']);

Route::get('/about', function () {
  echo "Hello World!";
});

// jangan hapus kode di bawah sini
Route::run();
