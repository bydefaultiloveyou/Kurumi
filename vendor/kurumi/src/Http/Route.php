<?php

namespace Kurumi\Http;

class Route
{
  private static array $routes;

  protected static $param;

  public static function get(string $path, $handler)
  {
    self::addRoute("GET", self::segmen($path), $handler);
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

  private static function segmen($path)
  {
    // ngeregex anjg
    if (preg_match('/{.*}/i', $path)) {

      // explode
      $p = explode("/", $path);
      $q = explode('/', parse_url($_SERVER["REQUEST_URI"])["path"]);

      // ambil nilai dari yang di berikan
      $d = array_search('{:segmen}', $p);
    }

    // kita rubah string dari path
    $path = @preg_replace('/{.*}/i', @$q[$d], $path);

    // simpan paramsnya
    self::$param =  @$q[$d];

    // return path baru
    return $path;
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
      self::$param,
      // yang penting disini gabungan get dan post
      array_merge($_GET, $_POST)
    ]);
  }
}
