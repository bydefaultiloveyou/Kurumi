<?php

namespace Kurumi\Handlers;

class Loads
{
  public function __construct($get_error)
  {
    $this->message = $get_error["message"];
    $this->file = $get_error["file"];
    $this->line = $get_error["line"];

    $this->getCode();
  }

  public function getCode()
  {
    $path = $this->file;
    $content = file_get_contents($path);
    $content = preg_replace('/(<?|php|)/', '',  $content);
    $this->showWebsite($this->message, $this->file, $this->line, $content);
  }

  public function showWebsite($message, $file, $line, $content)
  {
    include __DIR__ . "/Web/index.php";
  }
}
