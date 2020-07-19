<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;
use p4\blog\model\PostManager as PostManager;
require_once 'src/model/DbManager.php';

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
    public function addComment($pseudo, $title, $comment, $comment_date, $post_id){
        $dashboardCommentManager = new DashboardCommentManager();
        $addComment = $dashboardCommentManager->postComment($pseudo, $title, $comment, $comment_date, $post_id);
    }

    public function deleteCommentAwaiting($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->deleteCommentAwaiting($id);
    }
}