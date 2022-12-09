<?php

use Kurumi\Handling\Loads;

function view(string $path, $data = [])
{
  $dir = "./public/";

  if (!file_exists($dir . $path . '.php') and !file_exists($dir . $path . ".kurumi.php")) {
    die(Loads::showError($path));
  } else if (file_exists($dir . $path . '.php')) {
    require $dir . $path . '.php';
  } else if ($dir . $path . '.kurumi.php') {
    $kurumi = new Kurumi();
    require $dir . $path . '.kurumi.php';
  }
}
