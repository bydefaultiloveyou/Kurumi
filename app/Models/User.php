<?php

namespace App\Models;

/**
 * Disini kamu bisa menuliskan logika dan operasi
 * yang biasa dilakukan pada database (misalnya query).
 */
class User
{
  public static function Rasiel()
  {
    return new \Rasiel\Connect('users');
  }
}