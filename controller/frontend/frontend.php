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

    public function addComment($postId, $authorId, $comment)
    {
        $commentManager = new \Said\Projet4blog\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $authorId, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
           
        }else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }


    public function connectPage(){ //page de connexion


            require('view/frontend/connectView.php');

    }

    public function authentification($pass,$pseudo){

        $connectManager = new \Said\Projet4blog\Model\ConnectManager();

       
        $authentificationtest = $connectManager->connexion($pass, $pseudo);
        

        if($authentificationtest){
            header('location: index.php');
            echo 'Vous êtes connecté !';
        }

        

        require('view/frontend/connectView.php');
    }

    public function registeringBoard(){

        require('view/frontend/registerView.php');

    }

    public function registeringProcess($pseudo,$pass){

        $connectManager = new \Said\Projet4blog\Model\ConnectManager();

        $registerSet= $connectManager->registering($pseudo,$pass);

        if($registerSet){
            echo "enregistrement confirmé";
           
        }

        require('view/frontend/registerView.php');
    }


    public function signalComm($postId,$id){

        $commentManager = new \Said\Projet4blog\Model\CommentManager();
        $report = $commentManager->reportComm($id);

        header('location:index.php?action=post&id=' . $postId);
    }

}