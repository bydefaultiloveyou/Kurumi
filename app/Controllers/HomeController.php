<?php

namespace App\Controllers;

use App\Models\Home;

class HomeController
{

  protected $DB;

  public static function index()
  {
    return view("views/home", [
      "title" => "Kurumi Framework",
      "test" => Home::getData(),
    ]);
  }

  public static function about()
  {
    return view('views/about', [
      "title" => "About Page"
    ]);
  }

  public static function post($params)
  {
    echo $params["nama"];
  }
}
