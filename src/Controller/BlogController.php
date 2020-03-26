<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use DRWork\AbstractController;

class BlogController extends AbstractController
{
    private $entity;
    
    public function index()
    {
        $this->entity = new BlogRepository("comment");
        $comments = $this->entity->findAll();

        return $this->render('Blog/index.html.twig', 
        ["uri" => $_SERVER["REQUEST_URI"], "comments" => $comments]);
    }

    public function create()
    {
        $this->entity = new BlogRepository("comment");
        $this->entity->new($_REQUEST);

        header('Location: /blog');
    }

    public function delete()
    {
        $this->entity = new BlogRepository("comment");
        $id = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->entity->del($id);

        header('Location: /blog');
    }

    public function update()
    {
        $this->entity = new BlogRepository("comment");
        $id = end(explode("/", $_SERVER["REQUEST_URI"]));
        $this->entity->up($id, $_REQUEST);

        header('Location: /blog');
    }
}
