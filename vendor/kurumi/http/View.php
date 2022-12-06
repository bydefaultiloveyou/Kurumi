<?php

namespace Kurumi\Route;

class View
{
  /**
   * method untuk render html
   */
  public static function render(string $filename, array $data = [])
  {
    if (!file_exists("./public/views/" . $filename . ".php")) {
      self::errorFileHandling($filename);
    }
    require_once "./public/views/" . $filename . ".php";
  }

  /**
   *  method untuk menampilkan pesan error
   */
  private static function errorFileHandling(string $filename)
  {
    $message = "trying to access a file that doesn't exist.";
    require_once "./vendor/kurumi/handling/message/index.php";
  }
}
