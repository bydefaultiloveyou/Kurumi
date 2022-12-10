<?php

namespace Kurumi\Http;

class Route
{
  private static array $routes;

  public static function get(string $path, $handler)
  {
    self::addRoute("GET", $path, $handler);
  }

  public static function post(string $path, $handler)
  {
    self::addRoute("POST", $path, $handler);
  }

  private static function addRoute(string $method, string $path, $handler)
  {

    // isi variabel dengan method sekalian
    self::$routes[$method . $path] = [
      "method" => $method,
      "path" => $path,
      "handler" => $handler
    ];
  }

  public static function run()
  {

    // ambil url dari browser
    $RequestUri = parse_url($_SERVER["REQUEST_URI"]);
    $RequestPath = $RequestUri['path'];
    $method = $_SERVER["REQUEST_METHOD"];

    $handler = null;
    // looping semua array $routes
    foreach (self::$routes as $route) {

      // check apakah url browser sama seperti di routes
      if ($route["path"] === $RequestPath xor $route["path"] . "/" === $RequestPath) {

        // check apakah method url itu sama
        if ($route["method"] === $method) {
          // isi variabel handler dengan callback
          $handler = $route["handler"];
        }
      }
    }

    // menampilkan pesan 404 jika handler kosong
    if (!$handler) {
      $handler = function () {
        include './vendor/kurumi/src/Handling/Web/404.phtml';
      };
    }

    // jalankan method yang di beri di route
    call_user_func_array($handler, [

      // yang penting disini gabungan get dan post
      array_merge($_GET, $_POST)
    ]);
  }
}
