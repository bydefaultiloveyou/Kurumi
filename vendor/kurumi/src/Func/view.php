<?php

use Kurumi\Handling\Loads;

function view(string $path, $data = [])
{

  $dir = "./public/";

  if (!file_exists($dir . $path . '.php') and !file_exists($dir . $path . ".kurumi.php")) {

    die(Loads::showError($path));
  } else if (file_exists($dir . $path . '.php')) {

    include $dir . $path . '.php';
  } else if ($dir . $path . '.kurumi.php') {

    $kurumi = new Kurumi();

    include $dir . $path . '.kurumi.php';
  }
}
