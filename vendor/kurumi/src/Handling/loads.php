<?php

class loads
{
  public static function showError(string $filename)
  {
    $message = "trying to access a file that doesn't exist.";
    require_once "./vendor/kurumi/handling/message/index.php";
  }
}
