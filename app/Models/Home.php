<?php

namespace App\Models;

use Kurumi\Orm\DB;

class Home
{
  public static function DB()
  {
    return new DB();
  }

  public static function getData()
  {
    return self::DB()->select([
      "column" => "name",
      "table" => "test"
    ])->fetchAll();
  }
}
