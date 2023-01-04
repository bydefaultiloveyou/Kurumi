<?php

namespace Kurumi\Kurumi;


/**
 * aktifkan fitur layouting dengan
 * mengatur nilai enable menjadi true
 * pada file 'config/layout.php'
 */
class Layouts
{
  private string $dir = __DIR__ . '/../../../storage/framework/views/';

  public function __construct(string $filename, array $data = [])
  {
    // looping data dan jadikan variabel biasa
    foreach ($data as $key => $value) {
      eval('$$key = $value;');
    }

    // ambil nilai dari file 'layout.php'
    $config = require __DIR__ . '/../../../config/layout.php';

    // cek apakah fitur layouting aktif (true)
    if (!$config['enable']) {
      include $this->dir . $filename . '.kurumi.php';
      return false;
    }

    $__deus = new \Kurumi\Kurumi\Deus;
    include $this->dir . $config['filename'] . '.kurumi.php';
  }
}
