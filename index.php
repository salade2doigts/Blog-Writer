<?php
session_start();

require_once('controller/frontend/frontend.php');
require_once('controller/backend/backend.php');
require_once('model/Router/Router.php');


    $routeur = new App\Model\Router\Router($_GET['url']);
  

    $routeur->get('/', function () { 
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->listPosts();
    });

    $routeur->get('/posts', function () { echo 'super';
    });

    $routeur->get('/post/:id', function ($id) {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->post($id);
    });

    $routeur->get('/dashboard',function () {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->dashboard();
    });

    $routeur->get('/disconnect',function () {
        $_SESSION = array();
        session_destroy();
        header('location: http://localhost:8080/BlogRouteur/');
    });

    $routeur->get('/connect',function () {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->connect();
    });

    $routeur->get('/register',function () {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->register();
    });

    $routeur->post('/connecting',function () {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->connecting();
    });

    $routeur->post('/addComment/:id',function ($id) {
        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $controllerFront->addComment($id);
    });
    
    $routeur->run();
