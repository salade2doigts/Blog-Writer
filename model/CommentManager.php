<?php

namespace Said\Projet4blog\Model;

require_once("Manager.php");

class CommentManager extends Manager
{
    

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id, users.pseudo, comments.comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON comments.id_author = users.id WHERE post_id = ?');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getCommentsBoard()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT users.pseudo, comments.comment, comments.id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON comments.id_author = users.id WHERE report = 0');
         $comments->execute(array());
        return $comments;
    }

    public function getCommentsReportBoard()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT users.pseudo, comments.comment, comments.id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON comments.id_author = users.id WHERE report = 1');
         $comments->execute(array());
        return $comments;
    }

    public function postComment($postId, $authorId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, id_author, comment, report, comment_date) VALUES(?, ?, ?, 0, NOW())');
        $affectedLines = $comments->execute(array($postId, $authorId, $comment));

        return $affectedLines;
    }

    public function deleteComm($commId){

        $db = $this->dbConnect();
        $comms = $db->prepare('DELETE FROM comments WHERE id = ?');
        $comm = $comms->execute(array($commId));

        return $comm;
    }

    public function deleteCommArt($postId){

        $db = $this->dbConnect();
        $comms = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $comm = $comms->execute(array($postId));

        return $comm;
    }

    public function reportComm($id){

        $db = $this->dbConnect();
        $comms= $db->prepare('UPDATE comments SET report = 1 WHERE id=?');
        $comm = $comms->execute(array($id));
        return $comm;
        
    }

}