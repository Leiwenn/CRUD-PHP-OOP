<?php

namespace p4\blog\controller;
use p4\blog\model\CommentManager as CommentManager;

class CommentController{

    public function showComments($postId){
        $commentManager = new CommentManager();
        $showComments = $commentManager->getComments($postId);
        return $showComments;
    }

    public function addComment($pseudo, $title, $comment, $postId){
        $commentManager = new CommentManager();
        $addComment = $commentManager->setComment($pseudo, $title, $comment, $postId);
        return $addComment;
    }

    public function getComments($postId){
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($postId);
        return $comments;
    }

    public function addReport($comment_id, $member_pseudo, $post_concerned_id){
        $commentManager = new CommentManager();
        $addReport = $commentManager->setReport($comment_id, $member_pseudo, $post_concerned_id);
        return $addReport;
    }
}