<?php
session_start();

require_once('controller/frontend/frontend.php');
require_once('controller/backend/backend.php');
require_once('model/Router/Router.php');


    $routeur = new App\Model\Router\Router($_GET['url']);
  

    $routeur->get('/', function () { 
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->listPosts();;
    });
    $routeur->get('/posts', function () { echo 'super';
    });

    $routeur->get('/post/:id', function () {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->post();
    });

    
    $routeur->run();
