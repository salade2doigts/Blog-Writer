<?php


// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


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

function addPostEditor($id)
{
    $postManager2 = new \Said\Projet4blog\Model\PostManager();;
 
    $post = $postManager2->getPost($id);

    require('view/backend/AddEditorView.php');
}

function PostModifConfirm($post,$title,$id){
    $PostManager = new \Said\Projet4blog\Model\PostManager();;
    $UpPost = $PostManager->updatePost($post,$title,$id);
    
    if ($UpPost === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
    echo 'Article modifié';
    header('location: index.php?action=dashboard');
    }



}

function addArticleEditor(){


	require('view/backend/AddEditorView.php');
}

function AddArticleConfirm($title,$post){

	$PostManager = new \Said\Projet4blog\Model\PostManager();;
	$upPost = $PostManager->addPost($title,$post);

	header('location: index.php?action=dashboard');
}

function deleteArticle($id){
	$PostManager = new \Said\Projet4blog\Model\PostManager();;
	$delPost= $PostManager->deletePost($id);

	header('location: index.php?action=dashboard');
}

function listComms(){

	
    $commentManager = new \Said\Projet4blog\Model\CommentManager();
    $commentsB = $commentManager->getCommentsBoard();
    
    require('view/backend/DashBoardViewComm.php');

}

function deleteComment($id){
	$commentManager = new \Said\Projet4blog\Model\CommentManager();;
	$delComm= $commentManager->deleteComm($id);

		header('location: index.php?action=toCommControl');
}