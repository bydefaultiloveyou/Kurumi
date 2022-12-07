<?php

namespace App\Controllers;

use Kurumi\Route\View;

class  Controller
{
  public static function index()
  {
    View::render("home", [
      "title" => "kurumi framework"
    ]);
  }
}
