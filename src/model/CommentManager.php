<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class CommentManager extends DbManager{

    /**
     * post a comment awaiting publication by admin
     *
     * @param [type] $postId
     * @param [type] $pseudo
     * @param [type] $title
     * @param [type] $comment
     * @return void
     */
    public function setComment($pseudo, $title, $comment, $postId){
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO comments(pseudo, title, comment, comment_date, post_id, published) VALUES(?, ?, ?, NOW(), ?, 0)');
        $req->execute(array($pseudo, $title, $comment, $postId));
        return $req;
    }

    /**
     * COMMENTS get published comments of a post
     * controller _ showComments()
     *
     * @param [type] $postId
     * @return void
     */
    public function getComments($postId){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id AS comment_id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE published = 1 AND post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));
        return $req;
    }

    public function setReport($comment_id, $member_pseudo, $post_concerned_id){
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO reports(comment_id, member_pseudo, post_concerned_id) VALUES(?, ?, ?)');
        $req->execute(array($comment_id, $member_pseudo, $post_concerned_id));
        return $req;
    }

    
}