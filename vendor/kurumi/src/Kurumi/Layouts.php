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

  private string $dir = __DIR__ . "/../../../../storage/framework/views/";

  public function __construct(string $filename, array $data = [])
  {
    $this->render($filename, $data);
  }

  private function render(string $filename, array $data = [])
  {
    $config = require __DIR__ . '/../../../../config/layout.php';

    if ($config['enable']) {
      foreach ($data as $key => $value) {
        eval('$$key = $value;');
      }

      $slot = $this->dir . $filename . '.kurumi.php';
      include $this->dir . $config['filename'] . '.kurumi.php';
    } else {
      foreach ($data as $key => $value) {
        eval('$$key = $value;');
      }

      include $this->dir . $filename . '.kurumi.php';
    }
  }
}
