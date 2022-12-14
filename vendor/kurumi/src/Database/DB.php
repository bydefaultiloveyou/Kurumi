<?php

namespace Kurumi\Database;

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
  protected $join;
  protected $joinTable;
  protected $joinOn;
  protected $column = "*";
  protected $table;
  protected $where;
  protected $by;
  protected $value;

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

  public function create(array $query)
  {
    //table 
    if (isset($query["table"]) and is_string($query["table"])) {
      $this->table = $query["table"];
    }

    // column
    if (isset($query["column"]) and is_string($query["column"])) {
      $this->column = $query["column"];
    }

    // value
    if (isset($query["value"]) and is_array($query["value"])) {
      $this->value = $query["value"];
    }

    return $this->query("INSERT");
  }

  public function select(array $query)
  {
    // join
    if (isset($query["join"]) and is_array($query["join"])) {
      $this->join = $query["join"];
      $this->joinTable = $query["join"]["table"];
      $this->joinOn = $query["join"]["on"];
    }

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
      /**
       * Insert method
       */
    } elseif ($type === "INSERT") {
      try {
        foreach ($this->value as $value) {
          $query =  "INSERT INTO $this->table ( $this->column ) VALUES ( '" . implode("' , '", array_values($value)) . "');";
          return $this->connect->exec($query);
        }
      } catch (PDOException $error) {
        echo $query . "<br>" . $error->getMessage();
      }
    }

    $this->connect = null;
  }
}
