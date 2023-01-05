<?php

/*
|--------------------------------------------------------------------------
| Function View 
|--------------------------------------------------------------------------
|
|  fungsi untuk menampilkan halaman
|  @param  string $filename # file view yang ingin ditampilkan
|  @param  array  $data     # data yang dikirimkan ke file view
|  @return void
| 
|  @_path     -> path ke folder storage 
|  @_path_php -> path ke folder resources 
| 
|  @_file -> membuat file baru dengan modifikasi pada directive yang ada pada file 
|
*/


function view(string $filename, array $data = [])
{
  $_path     = __DIR__ . PATH_VIEW_STORAGE . $filename . ".kurumi.php";
  $_path_php = __DIR__ . PATH_VIEW_RESOURCES . $filename . ".php";
  $_file     = new Kurumi\Kurumi\File;

  if (file_exists($_path_php)) {
    include_once $_path_php;
  } elseif (file_exists($_path)) {
    new Kurumi\Kurumi\Layouts($filename, $data);
  } else {
    throw new Exception("view `{$filename}` tidak ditemukan!");
  }
}
