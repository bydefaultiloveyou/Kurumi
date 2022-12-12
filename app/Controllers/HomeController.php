<?php

namespace App\Controllers;

use App\Models\Home;
use Kurumi\Database\DB;

class HomeController
{
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

  public static function login()
  {
    return view('login', [
      "title" => "Login Page"
    ]);
  }

  public static function store($params)
  {
    return Home::store([
      "column" => "username, password",
      "table" => "user",
      "value" => [
        [
          "username" => $params["username"],
          "password" => $params["password"]
        ]
      ]
    ]);
  }
}
