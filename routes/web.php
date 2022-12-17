<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

Route::get('/', function () {
  view('welcome');
});

Route::run();
