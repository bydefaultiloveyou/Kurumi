<?php

namespace Kurumi\Database;

use PDO;
use Kurumi\Database\Validate;


class DB extends Validate
{

  protected $connect;

  public function __construct()
  {
    $databaseConfig = require "./config/database.php";

    $connect = new PDO($databaseConfig["dialect"] . ":host=" . $databaseConfig["host"] . ";dbname=" . $databaseConfig["database"], $databaseConfig["user"], $databaseConfig["password"]);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $this->connect = $connect;
  }

  public function create(array $query)
  {
    $this->table($query);

    $this->column($query);

    $this->value($query);

    return $this->query("INSERT");
  }

  public function select(array $query)
  {
    $this->distinct($query);
    $this->join($query);
    $this->table($query);
    $this->where($query);
    $this->by($query);
    return $this->query("SELECT");
  }

  public function delete(array $query)
  {

    $this->table($query);

    $this->where($query);

    return $this->query("DELETE");
  }

  public function update(array $query)
  {
    $this->column($query);

    $this->where($query);

    $this->table($query);

    return $this->query("UPDATE");
  }
}
