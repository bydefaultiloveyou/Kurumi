<?php

namespace Kurumi\Http;

/*
  nanti code code nya lu rapihin lagi, sengaja gua
  komentari dulu code nya takut salah nge hapus
 */

class Route
{

  private static $routes = [];

  /**
   * Get method
   * ini adalah http get method
   */
  public static function get(string $paths, $callback)
  {

    static::addRoute($paths, $callback);
  }

  /**
   * function buat menrender html secara otomatis
   */
  protected static $action;

  public static function view(string $path, array $action = [])
  {
    self::$action = $action;
    static::addRoute($path, function () {
      if (isset(self::$action[1])) {
        $data = self::$action[1];
      }

      view(self::$action[0], $data);
    });
  }

  /**
   * validasi path dan buat mengisi variabel $routes
   */
  private static function addRoute(string $path, $callback)
  {
    self::$routes = []; /* untuk membersihkan array, supaya tidak terjadi duplikat  */
    self::$routes[$path] = $callback;
    self::run();
  }

  /**
   * Run method
   * ini adalah method yang dimana program di eksekusi
   */
  private static function run()
  {
    $uri = $_SERVER['REQUEST_URI'];
    foreach (self::$routes as $path => $callback) {
      if ($uri !== $path xor $uri == $path . '/' xor $uri . '/' == $path) continue; // untuk mengatsi bug nya yang xor bre
      if ($callback == null) continue;
      return $callback();
    }
  }
}
