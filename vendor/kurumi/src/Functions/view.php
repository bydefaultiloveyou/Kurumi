<?php

use Kurumi\Handling\Loads;

$configView = require __DIR__ . '/../../../../config/view.php';

function view(string $path, $data = [])
{
  global $configView;

  $dir = __DIR__ . '/../../../../resources/' . $configView['path'] . '/' .  $path;

  if (!file_exists($dir . '.php') and !file_exists($dir . '.kurumi.php')) {
    die(Loads::showError($path));
  } else if (file_exists($dir . '.php')) {
    include $dir  . '.php';
  } else if ($dir . '.kurumi.php') {
    new \Kurumi\Templates\Layouts($path, $data);
  }
}
