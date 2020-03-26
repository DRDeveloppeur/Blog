<?php
namespace App\Repository;

use DRWork\Core\ORM;

class BlogRepository extends ORM
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function new($fields)
    {
        $this->create($this->table, $fields);
    }

    public function del($id)
    {
        $this->delete($this->table, $id);
    }

    public function up($id, $fields)
    {
        $this->update($this->table, $id, $fields);
    }

    public function show($id)
    {
        return $this->find($this->table, ["WHERE id = $id"]);
    }

    public function findByName($name)
    {
        return $this->find($this->table, ["WHERE name = $name"]);
    }

    public function findAll()
    {
        return $this->find($this->table, []);
    }
}