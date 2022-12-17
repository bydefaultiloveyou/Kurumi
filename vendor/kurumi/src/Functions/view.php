<?php

use Kurumi\Handling\Loads;

/** -----------------
 *  view
 *  digunakan untuk menampilkan design ke website
 *  
 *  @param string $filename
 *  menentukan nama file
 *  @param array $data
 *  data yang di beri di view ( optional )
 */

function view(string $filename, $data = [])
{

  $dir = "./../storage/framework/views/" . $filename;

  new \Kurumi\Kurumi\Generate();

  if (!file_exists($dir . '.php') and !file_exists($dir . '.kurumi.php')) {
    die(Loads::showError($filename));
  } else if (file_exists($dir . '.php')) {
    include $dir . '.php';
  } else if (file_exists($dir . '.kurumi.php')) {
    new \Kurumi\Kurumi\Layouts($filename, $data);
  }
}
