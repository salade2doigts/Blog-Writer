<?php
session_start();

require('controller/frontend/frontend.php');
require('controller/backend/backend.php');
require('tabs.php');

$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();    




if (isset($_GET['action'])){

    foreach ($actionsFront as $action) {
        switch ($_GET['action']) {
            case $action:
            return $controllerFront->$action();
            break;      
            default:
            http_response_code(404);
        }
    }

    foreach ($actionFrontParams as $action => $value) {
       switch ($_GET['action']) {
        case $action:
        return $controllerFront->$action(compact($value));
        break;
        default:
        http_response_code(404);
    }
}       

foreach ($actionsBack as $action) {
    switch ($_GET['action']) {
        case $action:
        return $controllerBack->$action();
        break; 
        default:
        http_response_code(404);
    }
}

foreach ($actionsBackParams as $action => $value) {
    switch ($_GET['action']) {
        case $action:
        return $controllerBack->$action(compact($value));
        break;
        default:
        http_response_code(404);
    }

}

if($_GET['action'] ==='disconnect'){

    $_SESSION = array();
    session_destroy();
    header('location: index.php');
}

}else{
    # code...
    $listPosts = $controllerFront->listPosts();
}
