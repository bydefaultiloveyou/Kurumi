<?php

namespace Kurumi\Database;

use PDO;
use Kurumi\Database\Validate;

/** -------------
 *  new DB
 *  sebuah method inti untuk Database system
 *  system ini kami sebut LurumiQ
 */

class DB extends Validate
{
  protected $connection;

  public function __construct()
  {
    $databaseConfig = require __DIR__ . "/../../../../config/database.php";

    $connection = new PDO("$databaseConfig[dialect]:
      host=$databaseConfig[host];dbname=$databaseConfig[database]",
      $databaseConfig['user'], $databaseConfig['password']
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $this->connection = $connection;
  }

  public function create(array $query)
  {
    $this->table($query);
    $this->column($query);
    $this->value($query);

    return $this->query('insert');
  }

  public function select(array $query)
  {
    $this->distinct($query);
    $this->join($query);
    $this->table($query);
    $this->where($query);
    $this->by($query);

    return $this->query('select');
  }

  public function delete(array $query)
  {
    $this->table($query);
    $this->where($query);

    return $this->query('delete');
  }

  public function update(array $query)
  {
    $this->column($query);
    $this->where($query);
    $this->table($query);

    return $this->query('update');
  }
}
