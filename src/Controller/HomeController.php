<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use DRWork\AbstractController;

class HomeController extends AbstractController
{
    private $blog;
    private $flashbag;

    public function __construct()
    {
        parent::__construct();
        $this->blog = new BlogRepository("article");
        $this->flashbag = $this->flash()->get(); 
    }

    public function index() 
    {
        $articles = $this->blog->findAll();
        
        return $this->render('Home/index.html.twig',
        ["uri" => $_SERVER["REQUEST_URI"], 'articles' => $articles, 'flash' => $this->flashbag]);
    }
    
    public function create()
    {
        $this->blog->new($_REQUEST);
        $this->flash()->set('Message poster !');


        $this->redirectToRoute('/');
    }
}