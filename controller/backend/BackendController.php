<?php
namespace Said\Projet4blog\controller\backend;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class BackendController{

    public function dashBoard()
    {       
        $postManager = new \Said\Projet4blog\Model\PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        require('view/backend/DashBoardView.php');
    }

    public function updatePost($id)               
    {   
        $postManager = new \Said\Projet4blog\Model\PostManager(); // Création d'un objet
        $post = $postManager->getPost($id); // Appel d'une fonction de cet objet
        require('view/backend/EditorView.php');
    }


    public function edition($id)
    {   
        extract($id);
        $postManager2 = new \Said\Projet4blog\Model\PostManager();
        
        $post = $postManager2->getPost($id);

        require('view/backend/EditorView.php');
    }

    public function addPostEditor($id)
    {       
        extract($id);
        $postManager2 = new \Said\Projet4blog\Model\PostManager();
        
        $post = $postManager2->getPost($_GET['id']);

        require('view/backend/AddEditorView.php');
    }

    public function modifPost($postTitleId)
    {
        extract($postTitleId);
        $PostManager = new \Said\Projet4blog\Model\PostManager();
        $UpPost = $PostManager->updatePost($_POST['editor_content'],$_POST['title'],$_GET['id']);
        
        if ($UpPost === false) {
            throw new Exception('Impossible de modifier l\'article !');
        }
        else {          
            header('Location: index.php?action=dashboard');
        }
    }

    public function toAddPost(){


    	require('view/backend/AddEditorView.php');
    }

    public function addPostConfirm($titlePost)
    {

    	$PostManager = new \Said\Projet4blog\Model\PostManager();
    	$upPost = $PostManager->addPost($_POST['title'],$_POST['add_content']);

    	header('Location: index.php?action=dashboard');
    }

    public function deletePost($id)
    {
        extract($id);
    	$PostManager = new \Said\Projet4blog\Model\PostManager();
    	$delPost= $PostManager->deletePost($id);
        
        $commentManager = new \Said\Projet4blog\Model\CommentManager();
        $deleteComments = $commentManager->deleteCommArt($id);

        header('Location: ./dashboard');
    }

    public function delComm($id)
    {
        extract($id);
    	$commentManager = new \Said\Projet4blog\Model\CommentManager();
    	$delComm= $commentManager->deleteComm($_GET['id']);

    	header('Location: index.php?action=toCommControl');
    }

    
    public function toCommControl()
    {
    	$commentManager = new \Said\Projet4blog\Model\CommentManager();
        $commentsReport = $commentManager->getCommentsReportBoard();
        $commentsB = $commentManager->getCommentsBoard();
        
        require('view/backend/DashBoardViewComm.php');
    }
}