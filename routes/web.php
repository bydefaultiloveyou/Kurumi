<?php

use App\Controllers\HomeController;
use Kurumi\Http\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/service', [HomeController::class, 'service']);

Route::get('/about/{:segmen}/detail', [HomeController::class, 'testSegmen']);

Route::run();
