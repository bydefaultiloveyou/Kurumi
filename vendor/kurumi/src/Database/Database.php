<?php


namespace Kurumi\Database;

use PDO;

class Database
{

    private string
        $table,
        $query = "",
        $column = "*";

    protected $connection;

    public function __construct($table)
    {
        $this->table = $table;
        $this->connection = new PDO("mysql:host=localhost;dbname=todolist", "root", "180505");
    }

    /* -----------------------------------
    *               COLUMN
    *------------------------------------*/
    public function column(string $column = "*")
    {
        $this->column = $column;
        return $this;
    }

    /* -----------------------------------
    *               WHERE
    *------------------------------------*/
    public function where(string $column, string $operator, string $value)
    {
        $this->query .= " WHERE $column $operator '$value' ";
        return $this;
    }

    /* -----------------------------------
    *               NOT
    *------------------------------------*/
    public function not(string $condition)
    {
        $this->query = " WHERE NOT $condition";
        return $this;
    }

    /* -----------------------------------
    *               ORDER
    *------------------------------------*/
    public function order(string $column)
    {
        $this->query .= "ORDER BY $column";
        return $this;
    }

    /* -----------------------------------
    *               LIMIT
    *------------------------------------*/
    public function limit($limit)
    {
        $this->query .= " LIMIT " . (string)$limit;
        return $this;
    }

    /* -----------------------------------
    *               offset
    *------------------------------------*/
    public function offset($offset)
    {
        $this->query .= " OFFSET " . (string)$offset;
        return $this;
    }

    /* -----------------------------------
    *               JOIN
    *------------------------------------*/
    public function join(string $table, array $condition, string $type = "INNER")
    {
        $this->query = "{$type} JOIN {$table} ON {$condition[0]} {$condition[1]} {$condition[0]}";
        return $this;
    }

    /* -----------------------------------
    *               GET
    *------------------------------------*/
    public function get()
    {
        $result = $this->connection->prepare("SELECT {$this->column} FROM tasks {$this->query};");
        $result->execute();
        return $result->fetchAll();
    }

    /* -----------------------------------
    *               FETCH
    *------------------------------------*/
    public function fetch()
    {
        $result = $this->connection->prepare("SELECT {$this->column} FROM tasks {$this->query};");
        $result->execute();
        return $result->fetch();
    }

    /* -----------------------------------
    *               CREATE
    *------------------------------------*/
    public function create(array $values)
    {
        $value = implode("' , '", array_values($values));
        $key = implode(" , ", array_keys($values));
        $query =  " INSERT INTO {$this->table} ( $key ) VALUES ( '$value' )";
        return $this->connection->exec("$query;");
    }


    /* -----------------------------------
    *               UPDATE
    *------------------------------------*/
    public function update(array $values)
    {
        foreach ($values as $key => $value) {
            $query = "UPDATE $this->table SET $key = '$value' {$this->query}";
            $result = $this->connection->prepare($query);
            $result->execute();
        }
    }


    /* -----------------------------------
    *               DELETE
    *------------------------------------*/
    public function delete()
    {
        $query = "DELETE FROM {$this->table} {$this->query}";
        $result = $this->connection->exec($query);
    }
}
