<?php

namespace Said\Projet4blog\controller\frontend;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectManager.php');

class FrontendController
{

  public function posts()
  {
    $postManager = new \Said\Projet4blog\Model\PostManager();; // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/frontend/listPostsView.php');
  }


  public function post($id)
  {
    $postManager = new \Said\Projet4blog\Model\PostManager();;
    $commentManager = new \Said\Projet4blog\Model\CommentManager();
    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    require('view/frontend/postView.php');
  }

  public function addComment($id)
  {

    $spaceVerif = trim($_POST['comment']);
    if (empty($spaceVerif)) {
      echo 'le commentaire ne peut être posté vide';
    } else {
      $commentManager = new \Said\Projet4blog\Model\CommentManager();

      $toEmpty = trim($_POST['comment']);
      $affectedLines = $commentManager->postComment($id, $_SESSION['id'], $toEmpty);

      if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
      } else {
        header('Location: http://localhost:8080/BlogRouteur/post/' . $id);
      }
    }
  }


  public function connect()
  { //page de connexion
    require('view/frontend/connectView.php');
  }

  public function connecting()
  {

    $connectManager = new \Said\Projet4blog\Model\ConnectManager();

    $authentificationtest = $connectManager->connexion($_POST['pass'], $_POST['pseudo']);

    if ($authentificationtest) {
      return header('Location: http://localhost:8080/BlogRouteur/');
    }
    require('view/frontend/connectView.php');
  }

  public function register()
  {

    require('view/frontend/registerView.php');
  }

  public function registering()
  {
    $connectManager = new \Said\Projet4blog\Model\ConnectManager();

    $registerSet = $connectManager->registering($_POST['pseudoreg'], $_POST['passreg']);

    if ($registerSet) {
      header('Location: view/frontend/registConfirmView.php');
    }
    require('view/frontend/registConfirmView.php');
  }

  public function signal($id)
  {
    
    $commentManager = new \Said\Projet4blog\Model\CommentManager();
    $report = $commentManager->reportComm($id);
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
  }
}
