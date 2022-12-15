<?php

namespace Kurumi\Templates;

use Kurumi\Templates\Kurumi;

class Layouts extends Kurumi
{
  protected $filename;

  public function __construct($filename, $data)
  {
    $this->filename = $filename;
    $this->render($data);
  }

  public function render($data)
  {
    $configLayout = require_once __DIR__ . '/../../../../config/layout.php';
    $kurumi = new Kurumi();
    $main = $this->path($this->filename);
    if ($configLayout['enable']) {
      include $this->path($configLayout['path']);
    } else {
      include $this->path($this->filename);
    }
  }
}
