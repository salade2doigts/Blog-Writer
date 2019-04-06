<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');

}


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $comment = $comments->fetch();

    require('view/frontend/postView.php');
    
}

function addComment($postId, $authorId, $comment)
{
    $commentManager = new CommentManager();

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

    $connectManager = new ConnectManager();

   
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

    $connectManager = new ConnectManager();

    $registerSet= $connectManager->registering($pseudo,$pass);

    if($registerSet){
        echo "enregistrement confirmé";
       
    }

    require('view/frontend/registerView.php');
}
