<?php

// use Kurumi\Handlers\Loads;

/**
 * fungsi untuk menampilkan halaman
 * @param  string $filename file view yang ingin ditampilkan
 * @param  array  $data     data yang dikirimkan ke file view
 * @return void
 */
function view(string $filename, array $data=[])
{
  $dir = __DIR__ . "/../../../storage/framework/views/$filename";

  /**
   * membuat file baru dengan modifikasi pada directive yang ada pada file
   */
  new Kurumi\Kurumi\Generate;

  if (file_exists("$dir.php")) {
    include_once "$dir.php";
  } elseif (file_exists("$dir.kurumi.php")) {
    new \Kurumi\Kurumi\Layouts($filename, $data);
  } else {
    throw new Exception("view `{$filename}` tidak ditemukan!");
  }
}
