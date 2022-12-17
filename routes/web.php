<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

Route::get('/', function () {
  view('welcome');
});

// example
Route::get('/test', [HomeController::class, 'test']);

Route::run();
