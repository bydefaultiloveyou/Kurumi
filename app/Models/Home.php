<?php

/*  
|--------------------------------------------------------------------------
| Models
|--------------------------------------------------------------------------
| 
|
|
|
|
 */

namespace App\Models;

use Kurumi\Database\DB;

class Home
{
  public static function DB()
  {
    return new DB();
  }

  // example
  public static function show()
  {
    return self::DB()->select([
      "column" => "username",
      "table" => "user"
    ])->fetchAll();
  }
}
