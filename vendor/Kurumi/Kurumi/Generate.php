<?php

namespace Kurumi\Kurumi;

/** ---------------
 *  new Generate
 *  sebuah class yang di gunakan untuk mengenerate ulang sebuah
 *  file kurumi mentah resources/view menjadi file kurumi matang storage/framework/views
 */
class Generate extends Regex
{
  public function __construct()
  {

    // validasi file
    (new Unlink())->remove();

    // mengambil semua file di folder resources/views
    $files = array_merge(
      glob(__DIR__ . '/../../../resources/views/*php'),
      glob(__DIR__ . '/../../../resources/views/**/*php'),
      glob(__DIR__ . '/../../../resources/views/**/**/*php'),
      glob(__DIR__ . '/../../../resources/views/**/**/**/*php'),
      glob(__DIR__ . '/../../../resources/views/**/**/**/**/*php')
    );

    // looping semua file di resources/view
    foreach ($files as $file) {

      // hapus string '/../../../../resources/views/' sehingga hanya menampilkan nama file
      $filename = str_replace(__DIR__ . '/../../../resources/views/', "", $file);


      // ganti / dengan .
      $filename = str_replace("/", ".", $filename);


      // ambil content di di setiap file resources/views
      $contents = file_get_contents($file);


      // buat file
      $file_new = fopen(__DIR__ . "/../../../storage/framework/views/" . $filename, 'w');


      // dan isi dengan content
      fwrite($file_new, $this->run($contents));


      fclose($file_new);
    }
  }
}
