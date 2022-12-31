<?php

namespace App\Models;

/**
 * Disini kamu bisa menuliskan logika dan operasi
 * yang biasa dilakukan pada database (misalnya query).
 *
 * ini adalah contoh Models, bisa di hapus jika tidak di gunakan.
 */
class Task
{

  // Di larang Menghapus method ini di setiap file
  public static function Rasiel()
  {
    return new \Rasiel\Connect('tasks');
  }
}
