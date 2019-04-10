<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectManager.php');

function listPosts()
{
    $postManager = new \Said\Projet4blog\Model\PostManager();; // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');

}


function post()
{
    $postManager = new \Said\Projet4blog\Model\PostManager();;
    $commentManager = new \Said\Projet4blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);


    require('view/frontend/postView.php');
    
}

function addComment($postId, $authorId, $comment)
{
    $commentManager = new \Said\Projet4blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $authorId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
       
    }else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function connectPage(){ //page de connexion


        require('view/frontend/connectView.php');

}

function authentification($pass,$pseudo){

    $connectManager = new \Said\Projet4blog\Model\ConnectManager();

   
    $authentificationtest = $connectManager->connexion($pass, $pseudo);
    

    if($authentificationtest){
        header('location: index.php');
        echo 'Vous êtes connecté !';
    }

    

    require('view/frontend/connectView.php');
}

function registeringBoard(){

    require('view/frontend/registerView.php');

}

function registeringProcess($pseudo,$pass){

    $connectManager = new \Said\Projet4blog\Model\ConnectManager();

    $registerSet= $connectManager->registering($pseudo,$pass);

    if($registerSet){
        echo "enregistrement confirmé";
       
    }

    require('view/frontend/registerView.php');
}
