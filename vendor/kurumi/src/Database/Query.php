<?php

namespace Kurumi\Database;

use PDOException;

class Query
{

  private function Select()
  {

    ($this->distinct) ? $query = "SELECT DISTINCT $this->column FROM $this->table " : $query = "SELECT $this->column FROM $this->table ";

    if (isset($this->where)) {
      $query .= "WHERE " . $this->where[0] . " " . $this->where[1] . " " . (string)$this->where[2];
    }

    if (isset($this->join)) {
      $query .= " JOIN " . $this->joinTable . " ON " . $this->joinOn[0] . " = " . $this->joinOn[1];
    }

    if (isset($this->by)) {
      $query .= " ORDER BY " . $this->by;
    }

    $result = $this->connect->prepare($query . ";");
    $result->execute();
    return $result;
  }

  private function delete()
  {
    $query =  "DELETE FROM $this->table WHERE " . $this->where[0] . " " . $this->where[1] . " " . (string)$this->where[2];
    try {
      $this->connect->exec($query);
    } catch (PDOException $error) {
      return $query . "<br>" . $error->getMessage();
    }
  }

  private function update()
  {
    if (is_array($this->column)) {
      $query = "UPDATE $this->table SET " . $this->column[0] . " = '" . $this->column[1] . "' WHERE " . $this->where[0] . " " . $this->where[1] . " " . (string)$this->where[2] . ";";
      try {
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result;
      } catch (PDOException $error) {
        echo $query . "<br>" . $error->getMessage();
      }
    }
  }

  private function insert()
  {
    try {
      foreach ($this->value as $value) {
        $query =  "INSERT INTO $this->table ( $this->column ) VALUES ( '" . implode("' , '", array_values($value)) . "');";
        return $this->connect->exec($query);
      }
    } catch (PDOException $error) {
      echo $query . "<br>" . $error->getMessage();
    }
  }

  protected function query(string $type)
  {
    if ($type == "SELECT") {
      return $this->Select();
    } elseif ($type === 'DELETE') {
      return $this->delete();
    } elseif ($type === "UPDATE") {
      return $this->update();
    } elseif ($type === "INSERT") {
      return $this->insert();
    }

    $this->connect = null;
  }
}
