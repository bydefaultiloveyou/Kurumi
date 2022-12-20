<?php

namespace Kurumi\Handlers;

class Loads
{
  private $list_error = [];
  private $filename;
  private $message;

  public function __construct($get_error, $filename, $message)
  {
    foreach ($get_error as $key => $value) {
      $this->list_error[$key] = @$value;
    }
    $this->getError($filename, $message);
  }

  public function getCode()
  {
    $path = $this->list_error[0]['file'];
    $content = file_get_contents($path);
    $content = preg_replace('/(<?|php|)/', '',  $content);
    return $content;
  }

  public function getError($filename, $message)
  {
    $this->filename = $filename;
    $this->message = $message;
    $this->showWebsite();
  }

  public function showWebsite()
  {
    include __DIR__ . "/Web/index.php";
  }
}
