<?php

use App\Controllers\Controller;
use Kurumi\Route\Route;

Route::get("/", function () {
  echo 'home';
});

Route::get("/about", function () {
  echo 'about';
});
