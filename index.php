<?php
session_start();

require('controller/frontend/frontend.php');
require('controller/backend/backend.php');

try { 
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
			$listPosts = $controllerFront->listPosts();
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

        }elseif ($_GET['action'] == 'disconnect') { // deconnexion
            
        	$_SESSION = array();
        	session_destroy();
        	header('location: index.php');

        }elseif ($_GET['action'] == 'dashboard') { // panneau d'aministration
          
        	$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        	$listPostsBoard= $controllerBack->listPostsBoard();
        	
        	
        }elseif ($_GET['action'] == 'modifArt') { // panneau de modification d'article
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        		$getPostBoard = $controllerBack->getPostBoard($_GET['id']);
        	}else {
                // Autre exception
        		throw new Exception('Aucun identifiant de billet envoyé');
        	}
        }elseif ($_GET['action'] == 'modifPost') { // confirmation de la modification de l'article
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        		$PostModifConfirm = $controllerBack->PostModifConfirm($_POST['editor_content'],$_POST['title'],$_GET['id']);                
        	}
        	else {
                // Autre exception
        		throw new Exception('Aucun identifiant de billet envoyé');
        	}
        }elseif($_GET['action'] == 'toRegister'){ // page d'inscription
        	$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        	$registeringBoard = $controllerFront->registeringBoard();

        }elseif($_GET['action'] == 'register'){ // enregistrement de l'inscription
        	$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        	$registeringProcess= $controllerFront->registeringProcess($_POST['pseudoreg'],$_POST['passreg']);

        }elseif($_GET['action'] == 'toAddPost'){ // Panneau d'ajout d'article
        	$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        	$AddArticleEditor = $controllerBack->AddArticleEditor();

        }elseif($_GET['action'] == 'addPostConfirm'){ // confirmation de l'ajour d'article
        	$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        	$addArticleConfirm = $controllerBack->addArticleConfirm($_POST['title'],$_POST['add_content']);

        }elseif($_GET['action'] == 'deletArt'){ // suppresion d'un article
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        		$deleteArticle = $controllerBack->deleteArticle($_GET['id']);
        	}else {
                // Autre exception
        		throw new Exception('Aucun identifiant de billet envoyé');
        	}
        }elseif($_GET['action'] == 'toCommControl'){ // panneau d'administration des commentaires
        	$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        	$listComms= $controllerBack->listComms();
        	
        }elseif($_GET['action'] == 'delComm'){ // supression d'un commentaire
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$controllerBack = new \Said\Projet4blog\controller\backend\ControllerBack();
        		$deleteComment = $controllerBack->deleteComment($_GET['id']);
        	}else {
                // Autre exception
        		throw new Exception('Aucun identifiant de billet envoyé');
        	}
        	
        }elseif($_GET['action'] == 'signal'){ // singalement d'un commentaire
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$controllerFront = new \Said\Projet4blog\controller\frontend\ControllerFront();
        		$signalComm = $controllerFront->signalComm($_GET['id'],$_GET['idComm']);
        	}else {
                // Autre exception
        		throw new Exception('Aucun identifiant de billet envoyé');
        	}
        	
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
catch(Exception $e) { // S'il y a eu une erreur, alors... redirection vers la page 404 si tentative de corruption d'URL
echo 'Erreur : ' . $e->getMessage();
require('view/errorView.php'); 
}
