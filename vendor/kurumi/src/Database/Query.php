<?php

namespace Kurumi\Database;

use PDOException;

/** -------------
 *  new Query
 *  sebuah class untuk Query database
 */
class Query
{
  private function select()
  {
    $distinct = ($this->distinct) ? 'DISTINCT' : '';
    $query = "SELECT $distinct {$this->column} FROM {$this->table}";

    if (isset($this->where)) {
      $query .= " WHERE {$this->where[0]} {$this->where[1]} " . (string)$this->where[2];
    }

    if (isset($this->join)) {
      $query .= " JOIN {$this->joinTable} ON {$this->joinOn[0]} = {$this->joinOn[1]}";
    }

    if (isset($this->by)) {
      $query .= " ORDER BY {$this->by}";
    }

    $result = $this->connection->prepare("$query;");
    $result->execute();
    return $result;
  }


  private function delete()
  {
    $query = "DELETE FROM {$this->table} WHERE {$this->where[0]} {$this->where[1]} " . (string)$this->where[2];
    try {
      $this->connection->exec("$query;");
    } catch (PDOException $error) {
      return "$query <br/>{$error->getMessage()}";
    }
  }


  private function update()
  {
    if (is_array($this->column)) {
      $query = "UPDATE {$this->table} SET {$this->column[0]} = '{$this->column[1]}' WHERE {$this->where[0]} {$this->where[1]} " . (string)$this->where[2];
      try {
        $result = $this->connect->prepare("$query;");
        $result->execute();
        return $result;
      } catch (PDOException $error) {
        echo "$query <br/>{$error->getMessage()}";
      }
    }
  }


  private function insert()
  {
    try {
      foreach ($this->value as $value) {
        $val = implode("' , '", array_values($value));
        $query =  "INSERT INTO {$this->table} ( {$this->column} ) VALUES ( '$val' )";
        return $this->connection->exec("$query;");
      }
    } catch (PDOException $error) {
      echo "$query <br/>{$error->getMessage()}";
    }
  }


  protected function query(string $type)
  {
    [
      'select' => fn() => $this->select(),
      'delete' => fn() => $this->delete(),
      'update' => fn() => $this->update(),
      'insert' => fn() => $this->insert(),
    ][$type]();

    $this->connection = null;
  }


}
