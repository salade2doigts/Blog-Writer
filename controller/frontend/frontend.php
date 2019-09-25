<?php
namespace Said\Projet4blog\controller\frontend;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectManager.php');

class ControllerFront{

    public function listPosts()
    {
        $postManager = new \Said\Projet4blog\Model\PostManager();; // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        require('view/frontend/listPostsView.php');
    }


    public function post()
    {
        $postManager = new \Said\Projet4blog\Model\PostManager();;
        $commentManager = new \Said\Projet4blog\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }  

    public function addComment($tabtIdAuthorIdComment)
    {	
        extract($tabtIdAuthorIdComment);
        $spaceVerif = trim($_POST['comment']);
        if (empty($spaceVerif)) {
          echo 'le commentaire ne peut être posté vide';
        }else{
          $commentManager = new \Said\Projet4blog\Model\CommentManager();

          $toEmpty = trim($_POST['comment']);
          $affectedLines = $commentManager->postComment($_GET['id'], $_SESSION['id'], $toEmpty);

          if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');

          }else{
            header('Location: index.php?action=post&id=' . $_GET['id']);
          }
        }
    }


    public function toConnect(){ //page de connexion
      require('view/frontend/connectView.php');
    }

    public function connect($tabPassPseudo){
        extract($tabPassPseudo);
        $connectManager = new \Said\Projet4blog\Model\ConnectManager();
      
        $authentificationtest = $connectManager->connexion($_POST['pass'], $_POST['pseudo']);

        if($authentificationtest){
            return header('Location: ./index.php');          
        }
        require('view/frontend/connectView.php');
    }

    public function toRegister(){

        require('view/frontend/registerView.php');

    }

    public function register($tabPassPseudo){
        extract($tabPassPseudo);

        $connectManager = new \Said\Projet4blog\Model\ConnectManager();

        $registerSet= $connectManager->registering($_POST['pseudoreg'],$_POST['passreg']);

        if($registerSet){
          header('Location: ./index.php?action=registConf');
        }
        require('view/frontend/registConfirmView.php');
    }

    public function signal($postIdCom){
      extract($postIdCom);
      $commentManager = new \Said\Projet4blog\Model\CommentManager();
      $report = $commentManager->reportComm($_GET['idComm']);
      
      header('Location: ./index.php?action=post&id=' . $_GET['id']);    
    }
  }