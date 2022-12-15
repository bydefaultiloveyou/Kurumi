<?php

namespace App\Controllers;

class HomeController
{
  public static function index()
  {
    layouts("home", ["title" => "Kurumi Framework"]);
  }
}
