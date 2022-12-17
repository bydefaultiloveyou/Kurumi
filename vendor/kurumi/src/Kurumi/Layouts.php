<?php

namespace Kurumi\Kurumi;

/** ----------------
 *  new Layouts
 *  adalah sebuah class yang dimana mengatur pengunaan layouts
 *  jika di dalam file config/layout -> enable = true
 *  maka otomatif akan mengaktif kan fitur layouts
 */

class Layouts
{

  private string $dir = "./storage/framework/views/";

  public function __construct(string $filename, array $data = [])
  {
    $this->render($filename, $data);
  }

  private function render(string $filename, array $data = [])
  {
    $config = require './config/layout.php';

    if ($config['enable']) {
      foreach ($data as $key => $value) {
        eval('$$key = $value;');
      }

      $slot = $this->dir . $filename . '.kurumi.php';
      include $this->dir . $config['filename'] . '.kurumi.php';
    } else {
      include $this->dir . $filename . '.kurumi.php';
    }
  }
}
