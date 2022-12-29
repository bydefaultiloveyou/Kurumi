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

    // ambil config dari folder config
    $config = require __DIR__ . '/../../../../config/layout.php';

    // looping data dan jadikan variabel biasa
    foreach ($data as $key => $value) {
      eval('$$key = $value;');
    }

    // check config enable
    switch ($config['enable']) {

        // jika true maka jalankan layouts
      case true:
        $slot = $this->dir . $filename . '.kurumi.php';
        include $this->dir . $config['filename'] . '.kurumi.php';
        break;

        // jika false ya tidak di jalankan
      default:
        include $this->dir . $filename . '.kurumi.php';
    }
  }
}
