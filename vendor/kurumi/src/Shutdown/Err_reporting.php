<?php


namespace Kurumi\Shutdown;

use Kurumi\Handlers\Loads;

class Err_reporting
{
  public function __construct()
  {
    /**
     *  Untuk menonaktifkan pesan defaulf php 
     *
     */

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(0);

    /**
     *  Membuat pesan error yang baru 
     *
     */

    register_shutdown_function(function () {
      $this->error_handler(error_get_last());
    });
  }

  private function error_handler($error)
  {
    /**
     *  Melolos kan error kalau error nya type null 
     *  (validasi)
     */

    $result = preg_match('/null$/', $error['message']);
    if ($result == 0) {
      $this->get_error_reporting($error);
    }
  }

  private function get_error_reporting($error)
  {
    /**
     *  Mengambil error yang telah di validasi
     *  dan mengirimkam datanya ke Loads
     */

    new Loads($error);
  }
}
