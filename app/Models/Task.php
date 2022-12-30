<?php

namespace App\Models;
use Kurumi\Database\Database;


/**
 * Disini kamu bisa menuliskan logika dan operasi
 * yang biasa dilakukan pada database (misalnya query).
 */
class Task
{
  public static function DB()
  {
    return new Database('tasks');
  }
}
