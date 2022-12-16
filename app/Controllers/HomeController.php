<?php

namespace App\Controllers;

class HomeController
{
  public static function index()
  {
    view("home", [
      "title" => "Kurumi Framework"
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
