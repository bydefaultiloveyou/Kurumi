<?php

namespace Kurumi\Templates;

use Kurumi\Templates\Kurumi;

class Layouts extends Kurumi
{
  protected $filename;

  // menjalankan function render
  public function __construct($filename, $data)
  {
    $this->filename = $filename;
    $this->render($data);
  }

  public function render($data)
  {
    // mengambil config dari ./config/layouts
    $view = require_once __DIR__ . '/../../../../config/layout.php';

    // intansiasi class kurumi
    $kurumi = new Kurumi();

    // root di rectory
    $dir =  __DIR__ . '/../../../../storage/framework/views/';
    // check apakah fitur layouts di aktifkan / tidak
    if ($view["enable"]) {

      // jika iyha buat layoutsnya
      $slot = $dir . $this->filename . '.kurumi.php';
      include $dir . $view["path"] . '.kurumi.php';
    } else {

      // jika tidak jangan buat layoutsnya
      include $dir . $this->filename . '.kurumi.php';
    }
  }
}
