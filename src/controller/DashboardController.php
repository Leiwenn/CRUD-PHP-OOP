<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
use p4\blog\model\DashboardManager as DashboardManager;
use p4\blog\model\PostManager as PostManager;
require_once 'src/model/DbManager.php';

class DashboardController{

    //public $totalMembers;

    /**
     * show dashboard with widgets
     *
     * @return void
     */
    public function showDashboard(){
        $titleh1 = 'Dashboard';
        $totalMembers = self::totalMembers();
        $totalCommentsAwaiting = self::totalCommentsAwaiting();
        $totalReports = self::totalReports();

        $titleh2 = 'Mes billets';
        $titleh3 = 'Billets publiés';
        $totalPosts = self::totalPosts();
        $showPostsList = self::showPostsList();
        $titleh4 = 'Billets en attente de publication';
        $showPostsAwaiting = self::showPostsAwaiting();

        $content = require 'view/backOffice/dashboard.php';
        require 'view/backOffice/template.php';
    }
    /**
     * WIDGET MEMBERS count total of members
     *
     * @return void
     */
    public function totalMembers(){
        $memberManager = new MemberManager();
        $getTotalMembers = $memberManager->countMembers();
        return $getTotalMembers;
    }
    /**
     * WIDGET COMMENTS count total of comments awaiting to be publish by admin
     *
     * @return void
     */
    public function totalCommentsAwaiting(){
        $dashboardManager = new DashboardManager();
        $totalCommentsAwaiting = $dashboardManager->countCommentsAwaiting();
        return $totalCommentsAwaiting;
    }
    /**
     * WIDGET REPORTS count total of reports
     *
     * @return void
     */
    public function totalReports(){
        $dashboardManager = new DashboardManager();
        $totalReports = $dashboardManager->countReports();
        return $totalReports;
    }

    /**
     * count total of posts ALASKA
     *
     * @return void
     */
    public function totalPosts(){
        $dashboardManager = new DashboardManager();
        $totalPosts = $dashboardManager->countPosts();
        return $totalPosts;
    }
    public function showPostsList(){
        $postManager = new PostManager();
        $showPostsList = $postManager->getPosts();
        return $showPostsList;
    }
    public function showPostsAwaiting(){
        $dashboardManager = new DashboardManager();
        $showPostsAwaiting = $dashboardManager->getPostsAwaiting();
        return $showPostsAwaiting;
    }

    // ---- COMMENTS ----

    /**
     * get all the comments awaiting
     *
     * @return void
     */
    public function commentsAwaiting(){
        $dashboardManager = new DashboardManager();
        $commentsAwaiting = $dashboardManager->getCommentsAwaiting();
        return $commentsAwaiting;
    }
    /**
     * manage the display of these
     *
     * @return void
     */
    public function showCommentsAwaiting(){
        $showCommentsAwaiting = self::commentsAwaiting();
        $content = require 'view/backOffice/commentsAwaiting.php';
        require 'view/backOffice/template.php';
    }
    public function deleteAComment(){

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
        $dashboardManager = new DashboardManager();
        $addComment = $dashboardManager->postComment($pseudo, $title, $comment, $comment_date, $post_id);
    }
    // ---- END COMMENTS ----

    // ---- REPORTS ----

    /**
     * delete a reported comment
     * 
     */
    public function deleteComment($id){
        $dashboardManager = new DashboardManager();
        $deleteAComment = $dashboardManager->deleteComment($id);
        return $deleteAComment;
    }
    /**
     * REPORTS  keep a reported comment
     * manager _ keepComment($commentId)
     */
    public function keepAComment($id){
        $dashboardManager = new DashboardManager();
        $keepAComment = $dashboardManager->keepComment($id);
        return $keepAComment;
    }
    
    public function getAllReports(){
        $dashboardManager = new DashboardManager();
        $getAllReports = $dashboardManager->getReports();
        return $getAllReports;
    }
    public function showComment(){
        $dashboardManager = new DashboardManager();
        $showComment = $dashboardManager->showComment();
        return $showComment;
    }
    public function showReports(){
        $h1 = 'Dashboard';
        $h2 = 'Modération';
        $h3 = 'Demandes de modération:';
        $getAllReports = self::getAllReports();
        $showComment = self::showComment();
        $content = require 'view/backOffice/reports.php';
        require 'view/backOffice/template.php';
    }

    public function getReport($id){
        //obtenir le report
        $dashboardManager = new DashboardManager();
        $getReport = $dashboardManager->getReport($id);
        return $getReport;
    }
    public function showReport($id){
        //afficher le report
        $h1 = 'Dashboard';
        $h2 = 'Modération';
        $h3 = 'Modérer ce commentaire:';
        $getAReport = self::getReport($id);
        $content = require 'view/backOffice/oneReport.php';
        require 'view/backOffice/template.php';
    }

    // ---- END REPORTS ----

    public function showEditor(){
        $content = require 'view/backOffice/editor.php';
        require 'view/backOffice/template.php';
    }    
}