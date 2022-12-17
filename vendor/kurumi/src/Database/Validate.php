<?php

namespace Kurumi\Database;

use Kurumi\Database\Query;

class Validate extends Query
{

  protected $join, $joinTable, $joinOn, $column = "*", $table, $where, $by, $value, $distinct = false, $in;

  protected function distinct($query)
  {
    if (isset($query["distinct"]) and is_bool($query["distinct"])) $this->distinct = $query["distinct"];
  }

  protected function table($query)
  {
    if (isset($query["table"]) and is_string($query["table"])) $this->table = $query["table"];
  }

  protected function column($query)
  {
    if (isset($query["column"]) and is_string($query["column"])) $this->column = $query["column"];
  }

  protected function value($query)
  {
    if (isset($query["value"]) and is_array($query["value"])) $this->value = $query["value"];
  }

  protected function join($query)
  {
    if (isset($query["join"]) and is_array($query["join"])) {
      $this->join = $query["join"];
      $this->joinTable = $query["join"]["table"];
      $this->joinOn = $query["join"]["on"];
    }
  }

  protected function where($query)
  {
    if (isset($query["where"]) and is_array($query["where"])) $this->where = $query["where"];
  }

  protected function by($query)
  {
    if (isset($query["by"]) and is_string($query["by"])) $this->by = $query["by"];
  }
}
