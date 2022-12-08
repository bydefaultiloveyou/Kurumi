<?php

namespace App\Controllers;

class UserController
{

  public static function home()
  {
    return view('views/home');
  }

  public static function about()
  {
    return view('views/about');
  }
}
