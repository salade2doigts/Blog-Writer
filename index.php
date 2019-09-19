<?php
session_start();

require('controller/frontend/frontend.php');
require('controller/backend/backend.php');

$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();    

$actionsFront = ['post','toConnect','toRegister'];
$actionsBack = ['dashBoard','toAddPost','toCommControl','dashboard','modifArt'];

if (isset($_GET['action'])) {

    foreach ($actionsFront as $action) {
        switch ($_GET['action']) {
            case $action:
            return $controllerFront->$action();
            break;
            case 'connect':
            return $controllerFront->connect($_POST['pass'],$_POST['pseudo']);
            break; 
            case 'addComment':
            return $controllerFront->addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
            case 'register':
            return $controllerFront->register($_POST['pseudoreg'],$_POST['passreg']);
            break;
            case 'signal':
            return $controllerFront->signal($_GET['id'],$_GET['idComm']);  
            break;
            case 'disconnect':
            $_SESSION = array();
            session_destroy();
            header('location: index.php');
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
            case 'modifArt':
            return $controllerBack->modifArt($_GET['id']);
            break;
            case 'modifPost':
            return $controllerBack->modifPost($_POST['editor_content'],$_POST['title'],$_GET['id']); 
            break;
            case 'addPostConfirm':
            return $controllerBack->addPostConfirm($_POST['title'],$_POST['add_content']);
            break;
            case 'deletArt':
            return $controllerBack->deleteArt($_GET['id']);
            break;
            case 'delComm':
            return $controllerBack->delComm($_GET['id']);
            break;
            case 'disconnect':
            $_SESSION = array();
            session_destroy();
            header('location: index.php');
            break; 
            default:
            http_response_code(404);
        }
    }

}else{
    # code...
    $listPosts = $controllerFront->listPosts();
}

