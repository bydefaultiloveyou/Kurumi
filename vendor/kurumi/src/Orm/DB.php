<?php

namespace Kurumi\Orm;

use PDO;
use PDOException;

class DB
{

  protected $connect;

  // database
  protected $host;
  protected $user;
  protected $password;
  protected $database;
  protected $dialect;

  // method
  protected $select;
  protected $update;
  protected $delete;


  // query
  protected $column = "*";
  protected $table;
  protected $where;
  protected $by;

  public function __construct()
  {
    $this->host = parse_ini_file('.env')["DATABASE_HOST"];
    $this->user = parse_ini_file('.env')["DATABASE_USER"];
    $this->password = parse_ini_file('.env')["DATABASE_PASSWORD"];
    $this->database = parse_ini_file('.env')["DATABASE_NAME"];
    $this->dialect = parse_ini_file('.env')["DIALECT"];

    $connect = new PDO("$this->dialect:host=$this->host;dbname=$this->database", $this->user, $this->password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $this->connect = $connect;
  }

  public function select(array $query)
  {
    // column
    if (isset($query["column"]) and is_string($query["column"])) {
      $this->column = $query["column"];
    }

    // table
    if (isset($query["table"]) and is_string($query["table"])) {
      $this->table = $query["table"];
    }

    // where
    if (isset($query["where"]) and is_array($query["where"])) {
      $this->where = $query["where"];
    }

    //by
    if (isset($query["by"]) and is_string($query["by"])) {
      $this->by = $query["by"];
    }

    return $this->query("SELECT");
  }

  public function delete(array $query)
  {

    // table
    if (isset($query["table"]) and is_string($query["table"])) {
      $this->table = $query["table"];
    }
    // where
    if (isset($query["where"]) and is_array($query["where"])) {
      $this->where = $query["where"];
    }


    return $this->query("DELETE");
  }

  public function update(array $query)
  {

    // column
    if (isset($query["column"]) && is_array($query["column"])) {
      $this->column = $query["column"];
    }

    // where
    if (isset($query["where"]) and is_array($query["where"])) {
      $this->where = $query["where"];
    }

    // table
    if (isset($query["table"]) and is_string($query["table"])) {
      $this->table = $query["table"];
    }

    return $this->query("UPDATE");
  }

  protected function query(string $type)
  {
    /**
     * Seletect Method
     */
    if ($type == "SELECT") {
      $query = "SELECT $this->column FROM $this->table ";
      if (isset($this->where)) {
        $query .= "WHERE " . $this->where[0] . " " . $this->where[1] . " " . (string)$this->where[2];
      }

      if (isset($this->by)) {
        $query .= " ORDER BY " . $this->by;
      }

      $result = $this->connect->prepare($query . ";");
      $result->execute();
      return $result;
    }
    /**
     * Delete Method  
     */
    elseif ($type === 'DELETE') {
      $query =  "DELETE FROM $this->table WHERE " . $this->where[0] . " " . $this->where[1] . " " . (string)$this->where[2];
      try {
        $this->connect->exec($query);
      } catch (PDOException $error) {
        return $query . "<br>" . $error->getMessage();
      }
    }
    /**
     * Update Method
     */
    elseif ($type === "UPDATE") {
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

    $this->connect = null;
  }
}
