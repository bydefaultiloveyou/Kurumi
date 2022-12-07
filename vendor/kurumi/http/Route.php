<?php

namespace Kurumi\Route;

use app\controllers\Controllers;

class Route
{

  private static $routes = [];

  private static $url;

  /**
   * Get method
   * ini adalah http get method
   */

  private static $controller;
  private static $method = "index";

  public static function get(string $paths, $callback)
  {
    if (gettype($callback) === 'array') {

      $spliceController = explode("\\", $callback[0]);
      self::$controller = end($spliceController);

      if (file_exists("./app/controllers/" . self::$controller . ".php")) {

        require_once "./app/controllers/" . self::$controller . ".php";

        if (isset($callback[1])) {
          if (method_exists(new self::$controller, $callback[1])) {
            call_user_func_array([new self::$controller, $callback[1]], []);
          }
        }
      }
    } else {
      static::addRoute($paths, $callback);
    }
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

      View::render(self::$action[0], $data);
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

    if ($path !== $_SERVER["REQUEST_URI"]) {
      self::$routes[self::$url . "/"] = $callback;
    };

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
