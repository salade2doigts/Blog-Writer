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


    public function updatePost($post,$title,$id){
        $db = $this->dbConnect();
        $posts = $db->prepare('UPDATE posts SET post = ?,title = ?  WHERE id= ?');
        $modifPost= $posts->execute(array($post,$title,$id));
        return $modifPost;

    }

    public function addPost($title,$post)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(title,post,post_date) VALUES(?, ?, NOW())');
        $post = $posts->execute(array($title, $post));

        return $post;
    }

    public function deletePost($postId){

        $db = $this->dbConnect();
        $posts = $db->prepare('DELETE FROM posts WHERE id = ?');
        $post = $posts->execute(array($postId));

    }


}