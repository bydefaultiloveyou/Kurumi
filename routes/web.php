<?php

use Kurumi\Http\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::run();
