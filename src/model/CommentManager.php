<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class CommentManager extends DbManager{

    public function postComment($postId, $pseudo, $title, $comment){
        $db = $this->dbConnexion();

        $addComment = $db->prepare('INSERT INTO comments(post_id, pseudo, title, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
        $addCommentDb = $addComment->execute(array($postId, $pseudo, $title, $comment));

        return $addCommentDb;
    }

    /**
     * get all comments from DB
     *
     * @param [type] $postId
     * @return void
     */
    public function getComments($postId){
        $db = $this->dbConnexion();
        $getComments = $db->prepare('SELECT id, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $getComments->execute(array($postId));
        return $getComments;
    }

    public function setReport($postId, $pseudo){
        $db = $this->dbConnexion();
        $setReport = $db->prepare('INSERT INTO reports(postId, pseudo) VALUES(?, ?)');
        $setReportDb = $setReport->execute(array($postId, $pseudo));
        return $setReportDb;
    }

    public function deleteComment(){
        $db = $this->dbConnexion();
        
    }
}