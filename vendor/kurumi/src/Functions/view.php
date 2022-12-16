<?php

use Kurumi\Handling\Loads;

$config_view = require __DIR__ . '/../../../../config/view.php';

function view(string $path, $data = [])
{
  global $config_view;

  $dir = __DIR__ . '/../../../../resources/' . $config_view['path'] . '/' .  $path;

  if (!file_exists($dir . '.php') and !file_exists($dir . '.kurumi.php')) {
    die(Loads::showError($path));
  } else if (file_exists($dir . '.php')) {
    include $dir  . '.php';
  } else if ($dir . '.kurumi.php') {
    new \Kurumi\Templates\Layouts($path, $data, $config_view['path']);
  }
}
