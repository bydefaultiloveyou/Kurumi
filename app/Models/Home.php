<?php

namespace App\Models;

use Kurumi\Database\DB;

class Home
{
  public static function DB()
  {
    return new DB();
  }

  public static function show()
  {
    return self::DB()->select([
      "column" => "name",
      "table" => "test"
    ])->fetchAll();
  }

  public static function store(array $query)
  {
    return self::DB()->create($query);
  }
}
