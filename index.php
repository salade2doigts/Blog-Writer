<?php
session_start();

require_once('controller/frontend/FrontendController.php');
require_once('controller/backend/BackendController.php');
require_once('model/Router/Router.php');


    $routeur = new App\Model\Router\Router($_GET['url']);
  

    $routeur->get('/', function () { 
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->posts();
    });

    $routeur->get('/posts', function () { echo 'super';
    });

    $routeur->get('/post/:id', function ($id) {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->post($id);
    });

    $routeur->get('/disconnect',function () {
        $_SESSION = array();
        session_destroy();
        header('location: http://localhost:8080/BlogRouteur/');
    });

    $routeur->get('/connect',function () {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->connect();
    });

    $routeur->get('/register',function () {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->register();
    });

    $routeur->post('/connecting',function () {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->connecting();
    });

    $routeur->post('/registering',function () {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->registering();
    });

    $routeur->post('post/addComment/:id',function ($id) {
        $front = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->addComment($id);
    });
    $routeur->get('/signal/:id',function ($id) {
        $front  = new \Said\Projet4blog\controller\frontend\FrontendController();
        $front->signal($id);
    });
    ///////////////////////////////BACKEND

    $routeur->get('/dashboard',function () {
        $backend = new \Said\Projet4blog\controller\backend\BackendController();
        $backend->dashboard();
    });
    
    $routeur->get('/updatePost/:id',function ($id) {
        $backend = new \Said\Projet4blog\controller\backend\BackendController();
        $backend->updatePost($id);
    });

    $routeur->get('/deletePost/:id',function ($id) {
        $backend = new \Said\Projet4blog\controller\backend\BackendController();
        $backend->deletePost($id);
    });

    $routeur->get('/createPage',function () {
        $backend = new \Said\Projet4blog\controller\backend\BackendController();
        $backend->createPage();
    });

    $routeur->get('/addPost',function () {
        $backend = new \Said\Projet4blog\controller\backend\BackendController();
        $backend->addPost();
    });

   

    $routeur->run();
