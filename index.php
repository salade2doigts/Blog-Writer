<?php
session_start();

require('controller/frontend/frontend.php');
require('controller/backend/backend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
                $postP= $controllerFront->post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
                    $addComments = $controllerFront->addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'toConnect') { // au click sur le bouton de connection
            $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
            $connectPage= $controllerFront->connectPage();

        }
        elseif ($_GET['action'] == 'connect') { // authentification
            $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
            $authentification = $controllerFront->authentification($_POST['pass'],$_POST['pseudo']);                

        }elseif ($_GET['action'] == 'disconnect') {
            # code...mettre une fonctione à la place
            $_SESSION = array();
            session_destroy();
            header('location: index.php');

        }elseif ($_GET['action'] == 'dashboard') {
            # code...mettre une fonctione à la place
            listPostsBoard();
                
               
        }elseif ($_GET['action'] == 'modifArt') {
            //if (isset($_GET['id']) && $_GET['id'] > 0) {
               getPostBoard($_GET['id']);
        }elseif ($_GET['action'] == 'modifPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    PostModifConfirm($_POST['editor_content'],$_POST['title'],$_GET['id']);                
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }elseif($_GET['action'] == 'toRegister'){
            $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
            $registeringBoard = $controllerFront->registeringBoard();

        }elseif($_GET['action'] == 'register'){
            $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
            $registeringProcess= $controllerFront->registeringProcess($_POST['pseudoreg'],$_POST['passreg']);

        }elseif($_GET['action'] == 'toAddPost'){

            AddArticleEditor();

        }elseif($_GET['action'] == 'addPostConfirm'){

            addArticleConfirm($_POST['title'],$_POST['add_content']);

        }elseif($_GET['action'] == 'deletArt'){

            deleteArticle($_GET['id']);

        }elseif($_GET['action'] == 'toCommControl'){

            listComms();
            
        }elseif($_GET['action'] == 'delComm'){
            deleteComment($_GET['id']);

                
        }elseif($_GET['action'] == 'signal'){
            $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
            $signalComm = $controllerFront->signalComm($_GET['id'],$_GET['idComm']);

                
        }else{
            // Autre exception
            throw new Exception('Erreur');

        }
    }
    else {

        $controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        $listPosts = $controllerFront->listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
   // require('view/errorView.php');  Bon là je vous laisse travailler la vue vous-mêmes, je pense que vous avez compris le concept !
}
