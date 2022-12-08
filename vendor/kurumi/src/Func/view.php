<?php

use Kurumi\Handling\Loads;

function view(string $path, $data = [])
{
  $paths = './public/' . $path . '.php';
  if (!file_exists($paths)) {
    die(Loads::showError($path));
  }
  require $paths;
}
