<?php

namespace Said\Projet4blog\Model;

require_once("Manager.php");

class CommentManager extends Manager
{
    

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT users.pseudo, comments.comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users, comments WHERE comments.id_author = users.id AND post_id = ?');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getCommentsBoard()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT users.pseudo, comments.comment, comments.id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users, comments WHERE comments.id_author = users.id');
         $comments->execute(array());
        return $comments;
    }

    public function postComment($postId, $authorId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, id_author, comment, report, comment_date) VALUES(?, ?, ?, 1, NOW())');
        $affectedLines = $comments->execute(array($postId, $authorId, $comment));

        return $affectedLines;
    }

    public function deleteComm($commId){

        $db = $this->dbConnect();
        $comms = $db->prepare('DELETE FROM comments WHERE id = ?');
        $comm = $comms->execute(array($commId));

        return $comm;
    }


}