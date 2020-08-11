<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;

class DashboardCommentController{

    /**
     * show all the comments awaiting
     *
     * @return void
     */
    public function showCommentsAwaiting(){
        $dashboardCommentManager = new DashboardCommentManager();
        $showCommentsAwaiting = $dashboardCommentManager->getCommentsAwaiting();
        $content = require 'view/backOffice/commentsAwaiting.php';
        require 'view/backOffice/template.php';
    }

    /**
     * post a comment who was awaiting
     *
     * @param [type] $pseudo
     * @param [type] $title
     * @param [type] $comment
     * @param [type] $comment_date
     * @param [type] $post_id
     * @return void
     */
    public function publishComment($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $addComment = $dashboardCommentManager->postComment($id);
        return $addComment;
    }

    public function deleteCommentAwaiting($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $deleteCommentAwait = $dashboardCommentManager->deleteCommentAwaiting($id);
        return $deleteCommentAwait;
    }
}