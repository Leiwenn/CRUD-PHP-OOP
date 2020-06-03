<?php

namespace p4\blog\controller;
use p4\blog\model\CommentManager as CommentManager;

class CommentController{

    public function showComments(){
        $commentsManager = new CommentManager();
        $showComments = $commentsManager->getComments($_GET['id']);
    }
}