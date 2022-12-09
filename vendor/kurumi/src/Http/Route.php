<?php

namespace Kurumi\Http;

/*
  nanti code code nya lu rapihin lagi, sengaja gua
  komentari dulu code nya takut salah nge hapus
 */

// class Route
// {

//   private static $routes = [];

//   /**
//    * Get method
//    * ini adalah http get method
//    */
//   public static function get(string $paths, $callback)
//   {
//     static::addRoute($paths, $callback);
//   }

//   /**
//    * Post Method
//    */
//   public static function post(string $paths, $callback)
//   {
//   }

//   /**
//    * function buat menrender html secara otomatis
//    */
//   protected static $action;

//   public static function view(string $path, array $action = [])
//   {
//     self::$action = $action;
//     static::addRoute($path, function () {
//       if (isset(self::$action[1])) {
//         $data = self::$action[1];
//       }

//       view(self::$action[0], $data);
//     });
//   }

//   /**
//    * validasi path dan buat mengisi variabel $routes
//    */
//   private static function addRoute(string $path, $callback)
//   {
//     self::$routes = []; /* untuk membersihkan array, supaya tidak terjadi duplikat  */
//     self::$routes[$path] = $callback;
//     self::run();
//   }

//   /**
//    * Run method
//    * ini adalah method yang dimana program di eksekusi
//    */
//   private static function run()
//   {
//     $uri = $_SERVER['REQUEST_URI'];
//     foreach (self::$routes as $path => $callback) {
//       if ($uri !== $path xor $uri == $path . '/' xor $uri . '/' == $path) continue; // untuk mengatsi bug nya yang xor bre
//       if ($callback == null) continue;
//       return $callback();
//     }
//   }
// }

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
        include './vendor/kurumi/src/Http/404.phtml';
      };
    }

    // jalankan method yang di beri di route
    call_user_func_array($handler, [

      // yang penting disini gabungan get dan post
      array_merge($_GET, $_POST)
    ]);
  }
}
