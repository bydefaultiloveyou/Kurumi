<?php

use App\Controllers\Controller;
use Kurumi\Route\View;
use Kurumi\Route\Route;

Route::get("/", function () {
  View::render("home", [
    "title" => "Kurumi Framework"
  ]);
});

Route::get("/testing", [Controller::class, 'index']);
