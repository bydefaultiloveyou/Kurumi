<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

Route::get('/', function () {
  return view('welcom');
});

Route::run();
