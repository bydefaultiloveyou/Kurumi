<?php

use Kurumi\Handling\Loads;

function view(string $path, $data = [])
{
  $dir = './public/' . $path;

  if (!file_exists($dir . '.php') and !file_exists($dir . '.kurumi.php')) {
    die(Loads::showError($path));
  } else if (file_exists($dir . '.php')) {
    include $dir  . '.php';
  } else if ($dir . '.kurumi.php') {
    $kurumi = new Kurumi\Templates\Kurumi();
    include $dir  . '.kurumi.php';
  }
}
