<?php

namespace Rasiel\Migration;

class MigrationQuery
{
    protected $query, $table, $connection;

    public function __construct($table, $connection)
    {
        $this->table = $table;
        $this->connection = $connection;
    }

    public function end()
    {
        $this->query .= ",";
    }

    public function id($count = 255)
    {
        $this->query .= "`id` bigint({$count}) NOT NULL AUTO_INCREMENT,";
    }

    public function string($column, $count = 255)
    {
        $toString = (string)$count;
        $this->query .= " `{$column}` varchar({$toString})";
        return $this;
    }

    public function int(string $column, $count = 255)
    {
        $toString = (string)$count;
        $this->query  .= " `{$column}` int({$toString})";
        return $this;
    }

    public function boolean(string $column)
    {
        $this->query  .= " `{$column}` BOOLEAN ";
        return $this;
    }

    public function default($value)
    {
        if (gettype($value) === "boolean") {
            switch ($value) {
                case true:
                    $this->query  .= " DEFAULT 1";
                    break;
                case false:
                    $this->query  .= " DEFAULT 0";
                    break;
            };
            return $this;
        }
        $this->query  .= " DEFAULT '$value' ";
        return $this;
    }

    public function bigInt(string $column, $count = 255)
    {
        $toString = (string)$count;
        $this->query  .= " `{$column}` bigint({$toString}) ";
        return $this;
    }

    public function notNull()
    {
        $this->query .= " NOT NULL";
        return $this;
    }

    public function unique()
    {
        $this->query .= " UNIQUE";
        return $this;
    }
    public function create()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->table}` ({$this->query} PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        // echo $sql;
        $this->connection->exec($sql);
    }
}
