<?php

namespace p4\blog\controller;
use p4\blog\model\CommentManager as CommentManager;

class CommentController{

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
}