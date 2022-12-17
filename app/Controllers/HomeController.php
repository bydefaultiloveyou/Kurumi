<?php

namespace App\Controllers;

class HomeController
{
  public static function index()
  {
    view("home", [
      "title" => "Kurumi Framework",
      "hewan" => [
        "gurita",
        "buaya",
        "betina",
        "kuda"
      ]
    ]);
  }

  public static function about()
  {
    view("about", [
      "title" => "PAGE ABOUT"
    ]);
  }

  public static function testSegmen($id)
  {
    view("test", [
      "id" => $id
    ]);
  }

  public static function service()
  {
    view("service", [
      "title" => "PAGE SERVICE"
    ]);
  }
}
