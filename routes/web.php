<?php

use Kurumi\Http\Route;
use App\Controllers\UserController;


Route::get('/', [UserController::class, 'home']);

Route::get('/about', [UserController::class, 'about']);

/*
  UserController::class ini mengembalikan/nge return
  namespace dari class
  'home' ini adalah untuk menjalankan method home 
  yang ada di class UserController;
  [] ini adalah wajih hukum nya kalau mau syntack nya
    kayak gini,
    jadi kalau syntack nya kayak gitu jadi dijalanin
    sekali per Route jadi ngabakal ada bug yang duplikat
    gitu bre, :v 
 */
