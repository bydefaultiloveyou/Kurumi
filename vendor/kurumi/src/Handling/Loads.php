<?php

namespace Kurumi\Handling;

class Loads
{
  public static function showError(string $filename)
  {
    $message = "trying to access a file that doesn't exist.";
    include __DIR__ . "/Web/index.php";
  }
}
