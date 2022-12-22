<?php

use Kurumi\Http\Route;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Untuk menentukan jalur path,
| @parms 1 path (jalur)
| @parms 2 callback secara default callback berupa function,
|          anonymous,
|          tapi disarankan menggunakan class, supaya memisahkan logic nya 
|          antara Routing, View, dan Models (MVC)
|
|          CONTOH 
|          Route::get('/', 'PageControllers::class', 'home')
|
 */


Route::get('/', function () {
  return view('welcom');
});

Route::run();
