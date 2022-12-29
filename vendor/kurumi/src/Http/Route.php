<?php

namespace Kurumi\Http;

use Kurumi\Http\RouteInterface;
use Kurumi\Http\Add;

class Route extends Add implements RouteInterface
{
  /** -----------------------
   *     HTTP GET METHOD 
   *-------------------------*/
  public static function get(string $path, $callback)
  {
    return Add::route("GET", $path, $callback);
  }

  /** -----------------------
   *     HTTP POST METHOD 
   *-------------------------*/
  public static function post(string $path, $callback)
  {
    return Add::route("POST", $path, $callback);
  }

  /** -----------------------
   *      HTTP PUT METHOD 
   *-------------------------*/
  public static function put(string $path, $callback)
  {
    return Add::route("PUT", $path, $callback);
  }

  /** -----------------------
   *    HTTP DELETE METHOD 
   *-------------------------*/
  public static function delete(string $path, $callback)
  {
    return Add::route("DELETE", $path, $callback);
  }

  /** -----------------------
   *          RUN 
   *-------------------------*/
  public static function run()
  {
    return new Start(
      self::$routes,
      self::$parameter
    );
  }
}
