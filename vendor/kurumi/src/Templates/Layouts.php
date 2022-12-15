<?php

namespace App\Templates;

class Layouts
{

  private $filename;

  public function __construct($filename, $data)
  {
    $this->filename = $filename;
    $this->render(
      $data
    );
  }

  private function dir(string $path)
  {
    return "./resources/views/" . $path . ".kurumi.php";
  }

  public function render($data)
  {
    $kurumi = new \Kurumi\Templates\Kurumi();
    $slot = $this->dir($this->filename);
    include $this->dir("components/layouts");
  }
}
