<?php

namespace App\Controllers;

use App\Models\Home;

class HomeController
{

  protected $DB;

  public static function index()
  {
    return view("home", [
      "title" => "Kurumi Framework"
    ]);
  }

  public static function about()
  {
    return view('about', [
      "title" => "About Page"
    ]);
  }

  public static function post($params)
  {
    echo $params["nama"];
  }
}
