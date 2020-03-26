<?php

$r->addRoute('GET', '/', ["\App\Controller\HomeController", "index"]);
$r->addRoute('GET', '/home', "\App\Controller\HomeController::index");
$r->addRoute('GET', '/contact', ["\App\Controller\ContactController", "index"]);
$r->addRoute('GET', '/blog', ["\App\Controller\BlogController", "index"]);
$r->addRoute('POST', '/blog', ["\App\Controller\BlogController", "create"]);
$r->addRoute('POST', '/blog/edit/{id}', ["\App\Controller\BlogController", "update"]);
$r->addRoute(['GET', 'POST'], '/blog/delete/{id}', ["\App\Controller\BlogController", "delete"]);
$r->addRoute('POST', '/contact', ["\App\Controller\ContactController", "message"]);
