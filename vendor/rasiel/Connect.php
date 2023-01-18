<?php

namespace Rasiel;

use Rasiel\Migration\MigrationQuery;

use PDO;

class Connect
{
    private string
        $table,
        $query = "",
        $column = "*";

    protected $connection;

    public function __construct($table)
    {
        $this->table = $table;
        $databaseConfig = require __DIR__ . "/../../config/database.php";
        $this->connection = new PDO(
            "$databaseConfig[dialect]:
            host=$databaseConfig[host];
            dbname=$databaseConfig[database]",
            $databaseConfig['user'],
            $databaseConfig['password']
        );
    }

    public function column(string $column = "*")
    {
        $this->column = $column;
        return $this;
    }

    public function where(string $column, string $operator, string $value)
    {
        $this->query .= " WHERE $column $operator '$value' ";
        return $this;
    }

    public function not(string $condition)
    {
        $this->query = " WHERE NOT $condition";
        return $this;
    }

    public function order(string $column)
    {
        $this->query .= "ORDER BY $column";
        return $this;
    }

    public function limit($limit)
    {
        $this->query .= " LIMIT " . (string)$limit;
        return $this;
    }

    public function offset($offset)
    {
        $this->query .= " OFFSET " . (string)$offset;
        return $this;
    }

    public function join(string $table, array $condition, string $type = "INNER")
    {
        $this->query = "{$type} JOIN {$table} ON {$condition[0]} {$condition[1]} {$condition[0]}";
        return $this;
    }

    public function get()
    {
        $result = $this->connection->prepare("SELECT {$this->column} FROM tasks {$this->query};");
        $result->execute();
        return $result->fetchAll();
    }

    public function fetch()
    {
        $result = $this->connection->prepare("SELECT {$this->column} FROM tasks {$this->query};");
        $result->execute();
        return $result->fetch();
    }

    public function create(array $values)
    {
        $value = implode("' , '", array_values($values));
        $key = implode(" , ", array_keys($values));
        $query =  " INSERT INTO {$this->table} ( $key ) VALUES ( '$value' )";
        return $this->connection->exec("$query;");
    }

    public function update(array $values)
    {
        foreach ($values as $key => $value) {
            $query = "UPDATE $this->table SET $key = '$value' {$this->query}";
            $result = $this->connection->prepare($query);
            $result->execute();
        }
    }

    public function delete()
    {
        $query = "DELETE FROM {$this->table} {$this->query}";
        $result = $this->connection->exec($query);
    }

    public function createTable(callable $callback)
    {
        $callback(new MigrationQuery($this->table, $this->connection));
    }
}
