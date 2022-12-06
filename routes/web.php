<?php

use Kurumi\Route\View;
use Kurumi\Route\Route;

Route::get("/", function () {
  View::render("home", [
    "title" => "kurumi framework"
  ]);
});


Route::view("/about", ["about", ["title" => "About Page"]]);

Route::view("/test", ["test", ["title" => "Test Page"]]);
