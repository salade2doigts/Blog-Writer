<?php

namespace Said\Projet4blog\Model;

require_once("Manager.php");

class PostManager extends Manager
{

 
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, post, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY post_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, post, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function updateComm($comment,$id){
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment = ? WHERE id= ?');
        $modifComm = $comments->execute(array($comment,$id));
        return $modifComm;

    }

    public function updatePost($post,$id){
        $db = $this->dbConnect();
        $posts = $db->prepare('UPDATE posts SET post = ? WHERE id= ?');
        $modifPost= $posts->execute(array($post,$id));
        return $modifPost;

    }

    /*private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }*/
}