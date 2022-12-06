<?php

namespace Kurumi\Route;

class Route
{

  private static $routes = [];

  private static $view = [];

  private static $url;

  /**
   * Get method
   * ini adalah http get method
   */
  public static function get(string $paths, callable $callback)
  {
    self::addRoute($paths, $callback);
  }


  /**
   * function buat menrender html secara otomatis
   */
  public static function view(string $path, array $view = [])
  {
    self::$view[$path] = $view;
    self::addRoute($path, function () {
      if (isset(self::$view[1])) {
        $data = self::$view[1];
      }

      foreach (self::$view as $path => $array) {
        if ($_SERVER["REQUEST_URI"] != $path) continue;
        View::render($array[0]);
      }
    });
  }

  /**
   * validasi path dan buat mengisi variabel $routes
   */
  private static function addRoute(string $paths, callable $callback)
  {
    foreach ([$paths] as $path) {
      if (strlen($path) >= 2) {
        self::$url = rtrim($path, "/");
      }
    }

    self::$routes[self::$url] = $callback;
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
      if ($uri !== $path) continue;
      return $callback();
    }
  }
}
