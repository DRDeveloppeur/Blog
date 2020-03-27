<?php

namespace App\Controller;

use App\Repository\DbRepository;
use DRWork\AbstractController;

class DbController extends AbstractController
{
    private $repository;
    
    public function __construct()
    {
        parent::__construct();
        $this->repository = new DbRepository;
    }
    
    public function index()
    {
        $tables = $this->repository->showTables();
        
        return $this->render('BDD/index.html.twig', 
        ["uri" => $_SERVER["REQUEST_URI"], "tables" => $tables]);
    }

    public function newTable()
    {
        $this->repository->newTable($_REQUEST['name']);
        
        header("Location: /DB");
    }

    public function showColumns()
    {
        $table_name = end(explode("/", $_SERVER["REQUEST_URI"]));
        $columns = $this->repository->showColumns($table_name);
        
        return $this->render('BDD/show.html.twig', 
        ["uri" => $_SERVER["REQUEST_URI"], "columns" => $columns, "table_name" => $table_name]);
    }

    public function newColumn()
    {
        $table_name = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->repository->newColumn($table_name, $_REQUEST);
        
        header("Location: /DB/$table_name");
    }

    public function delTable()
    {
        $table = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->repository->delTable($table);
        
        header("Location: /DB");
    }

    public function delColumn()
    {
        $names = end(explode("/", $_SERVER["REQUEST_URI"]));
        $array = explode("-", $names);
        $table_name = $array[0];
        $name_column = $array[1];
        $this->repository->delColumn($table_name, $name_column);
        
        header("Location: /DB/$table_name");
    }
}