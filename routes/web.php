<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);
