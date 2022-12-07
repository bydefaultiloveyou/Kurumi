<?php

use Kurumi\Route\View;
use Kurumi\Route\Route;

Route::get("/", function () {
  View::render("home", [
    "title" => "Kurumi Framework"
  ]);
});

Route::view('/about', ["about", ["title" => "about"]]);
Route::view('/about/', ["about", ["title" => "About/"]]);
