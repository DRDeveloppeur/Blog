<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use DRWork\AbstractController;

class BlogController extends AbstractController
{
    private $repo;

    public function __construct()
    {
        parent::__construct();
        $this->repo = new BlogRepository("article");
    }
    
    public function index()
    {
        $articles = $this->repo->findAll();

        return $this->render('Blog/index.html.twig', 
        ["uri" => $_SERVER["REQUEST_URI"], "articles" => $articles]);
    }

    public function create()
    {
        $this->repo->new($_REQUEST);

        header('Location: /blog');
    }

    public function delete()
    {
        $id = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->repo->del($id);

        header('Location: /blog');
    }

    public function update()
    {
        $id = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->repo->up($id, $_REQUEST);

        header('Location: /blog');
    }
}
