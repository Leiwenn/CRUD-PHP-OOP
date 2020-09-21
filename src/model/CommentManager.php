<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class CommentManager extends DbManager{

    public function setComment($pseudo, $title, $comment, $postId){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'INSERT INTO comments(pseudo, title, comment, comment_date, post_id, published) 
            VALUES(:pseudo, :title, :comment, NOW(), :postId, 0)'
        );
        $req->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $req->bindValue(':title', $title, \PDO::PARAM_STR);
        $req->bindValue(':comment', $comment, \PDO::PARAM_STR);
        $req->bindValue(':post_id', $postId, \PDO::PARAM_INT);
        $req->execute(array(
            'pseudo' => $pseudo, 
            'title' => $title, 
            'comment' => $comment, 
            'postId' => $postId
        ));
        return $req;
    }

    public function getComments($postId){
        $post_id = $postId;
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT id AS comment_id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, post_id 
            FROM comments 
            WHERE published = 1 AND post_id = :post_id 
            ORDER BY comment_date DESC'
        );
        $req->bindValue(':post_id', $post_id, \PDO::PARAM_INT);
        $req->execute(array(
            'post_id' => $post_id
        ));
        return $req;
    }
}