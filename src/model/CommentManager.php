<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class CommentManager extends DbManager{

    /**
     * post a comment to comments_awaiting -> awaiting publication
     *
     * @param [type] $postId
     * @param [type] $pseudo
     * @param [type] $title
     * @param [type] $comment
     * @return void
     */
    public function postComment($postId, $pseudo, $title, $comment){
        $db = $this->dbConnexion();

        $addComment = $db->prepare('INSERT INTO comments_awaiting(post_id, pseudo, title, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
        $addCommentDb = $addComment->execute(array($postId, $pseudo, $title, $comment));

        return $addCommentDb;
    }

    /**
     * COMMENTS get all comments of a post, validated by admin
     * controller _ showComments()
     *
     * @param [type] $postId
     * @return void
     */
    public function getComments($postId){
        $db = $this->dbConnexion();
        $getComments = $db->prepare('SELECT id AS comment_id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $getComments->execute(array($postId));
        return $getComments;
    }

    public function setReport($comment_id, $member_pseudo, $post_concerned_id){
        $db = $this->dbConnexion();
        $setReport = $db->prepare('INSERT INTO reports(comment_id, member_pseudo, post_concerned_id) VALUES(?, ?, ?)');
        $setReportDb = $setReport->execute(array($comment_id, $member_pseudo, $post_concerned_id));
        return $setReportDb;
    }

    
}