<?php

use Kurumi\Handling\Loads;

$config_view = require __DIR__ . '/../../../../config/view.php';

function view(string $path, $data = [])
{
  global $config_view;

  $dir = __DIR__ . '/../../../../resources/' . $config_view['path'] . '/' .  $path;

  if (!file_exists($dir . '.php') and !file_exists($dir . '.kurumi.php')) {

    // jika file nya tidak ada maka keluarkan pesan error
    die(Loads::showError($path));
  } else if (file_exists($dir . '.php')) {

    // jika file ada tapi tidak di barengi dengan extensi .kurumi.php maka tampilkan
    include $dir  . '.php';
  } else if ($dir . '.kurumi.php') {

    // jiks ada maka tampilkan bersama fiturnya
    new \Kurumi\Templates\Template($dir, $path);
    new \Kurumi\Templates\Layouts($path, $data);
  }
}
