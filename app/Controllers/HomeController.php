<?php

namespace App\Controllers;

class HomeController
{
  public static function index()
  {
    view("pages.home", [
      "title" => "Kurumi Framework",
      "hewans" => [
        "gurita",
        "buaya",
        "betina",
        "kuda"
      ]
    ]);
  }

  public static function about()
  {
    view("pages.about", [
      "title" => "PAGE ABOUT"
    ]);
  }

  public static function service()
  {
    view("pages.service", [
      "title" => "PAGE SERVICE"
    ]);
  }
}
