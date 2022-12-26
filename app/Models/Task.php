<?php

namespace App\Models;

use Kurumi\Database\Database;

class Task
{
  public static function DB()
  {
    return new Database('tasks');
  }
}
