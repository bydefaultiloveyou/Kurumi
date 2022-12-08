<?php

use Kurumi\Handling\loads;

function view(string $path, $data = [])
{
  $paths = './public/' . $path . '.php';
  if (!file_exists($paths)) {
    die(loads::showError($path));
  }
  require $paths;
}
