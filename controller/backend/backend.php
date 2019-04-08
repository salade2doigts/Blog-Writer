<?php


// Chargement des classes
require_once('model/PostManager.php');



function listPostsBoard()
{
    $postManager = new \Said\Projet4blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/backend/DashBoardView.php');
}

function getPostBoard($id)
{
    $postManager = new \Said\Projet4blog\Model\PostManager(); // Création d'un objet
    $post = $postManager->getPost($id); // Appel d'une fonction de cet objet
    require('view/backend/EditorView.php');
}


function edition($id)
{
    $postManager2 = new \Said\Projet4blog\Model\PostManager();;
 
    $post = $postManager2->getPost($id);

    require('view/backend/EditorView.php');
}

function PostModifConfirm($post,$id){
    $PostManager = new \Said\Projet4blog\Model\PostManager();;
    $postComm = $PostManager->updatePost($post,$id);
    
    if ($postComm === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
    echo 'commentaire modifié';
    }
}