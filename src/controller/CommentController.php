<?php

namespace p4\blog\controller;
use p4\blog\model\CommentManager as CommentManager;

class CommentController{

    /**
     * COMMENTS show all comments validated by admin
     * manager _ getComments($postId)
     *
     * @return void
     */
    public function showComments(){
        $commentManager = new CommentManager();
        $showComments = $commentManager->getComments($_GET['id']);
    }

    public function addComment($postId, $pseudo, $title, $comment){
        $commentManager = new CommentManager();
        $addComment = $commentManager->postComment($postId, $pseudo, $title, $comment);
    }

    public function addReport($postId, $pseudo){
        $commentManager = new CommentManager();
        $addReport = $commentManager->setReport($postId, $pseudo);
    }
}