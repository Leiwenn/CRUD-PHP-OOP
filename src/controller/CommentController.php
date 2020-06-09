<?php

namespace p4\blog\controller;
use p4\blog\model\CommentManager as CommentManager;

class CommentController{

    /**
     * show all comments of a post
     *
     * @return void
     */
    public function showComments(){
        $commentManager = new CommentManager();
        $showComments = $commentManager->getComments($_GET['id']);
    }

}