<?php
namespace App\Repository;

use DRWork\AbstractRepository;

class DbRepository extends AbstractRepository
{
    public function showTables()
    {
        $find = $this->pdo->prepare("SHOW TABLES");
        $find->execute();
        $tables = $find->fetchAll();
        return $tables;
    }

    public function showColumns($table)
    {
        $find = $this->pdo->prepare("SHOW COLUMNS FROM $table");
        $find->execute();
        $columns = $find->fetchAll();
        return $columns;
    }

    public function newTable($table)
    {
        $table = lcfirst($table);
        $query = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS $table (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT)");
        $query->execute();
    }

    public function newColumn($table, $column)
    {
        $column["Field"] = lcfirst(current($column));
        $column = implode(" ", $column);

        $query = $this->pdo->prepare("ALTER TABLE $table ADD $column");
        $query->execute();
    }

    public function delTable($table)
    {
        $query = $this->pdo->prepare("DROP TABLE $table");
        $query->execute();
    }

    public function delColumn($table, $column)
    {
        $query = $this->pdo->prepare("ALTER TABLE $table DROP $column");
        $query->execute();
    }
}