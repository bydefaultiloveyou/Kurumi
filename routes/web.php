<?php

use Kurumi\Route\Route;

Route::get('/', function () {
  return view('views/home');
});

Route::get('/about', function () {
  return view('views/about');
});
