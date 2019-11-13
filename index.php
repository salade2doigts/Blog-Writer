<?php
session_start();

require_once('controller/frontend/frontend.php');
require_once('controller/backend/backend.php');
require_once('model/Router.php');


    $routeur = new App\Router($_GET['url']);

    $routeur->get('/', function () { echo 'super';
    });
    $routeur->get('/posts', function () { echo 'super';
    });

    $routeur->get('/post', function () {
        //$controllerFront->post();
    });

    
    $routeur->run();
