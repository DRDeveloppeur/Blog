<?php

namespace App\Controller;

use DRWork\AbstractController;

class ContactController extends AbstractController
{
    public function index() 
    {
        return $this->render('Contact/index.html.twig', 
            ["uri" => $_SERVER["REQUEST_URI"]]);
    }
    
    public function message()
    {
        return $this->render('Contact/index.html.twig', 
            ['message' => $_POST['name'], "uri" => $_SERVER["REQUEST_URI"]]);
    } 
}
