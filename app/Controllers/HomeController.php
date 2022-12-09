<?php

namespace App\Controllers;

class HomeController
{
  public static function index()
  {
    return view("views/home", [
      "title" => "Kurumi Framework"
    ]);
  }

  public static function about()
  {
    return view('views/about', [
      "title" => "About Page"
    ]);
  }
}
