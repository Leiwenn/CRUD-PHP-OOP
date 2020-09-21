<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\PostManager as PostManager;
use p4\blog\model\DashboardReportManager as DashboardReportManager;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;
class DashboardPostController{

    private const TITLE = 'Billets';
    private const H1 = 'Dashboard';
    private const HOMEDASHBOARD = 'Accueil Dashboard';
    private const LINKTINY = 'Editeur de texte';
    private const LINKHOME = 'Voir le site';

    public function showPostDashboard($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $h2 = 'Modifier le billet';
        $linkEdit = 'Editer';
        $linkDelete = 'Supprimer';
        $showPostDashboard = $this->getPostDashboard($id);
        $content = require 'view/backOffice/postDashboard.php';
        require 'view/backOffice/template.php'; 
    }

    public function getPostDashboard($id){
        $postManager = new PostManager();
        $getPostDashboard = $postManager->getPost($id);
        return $getPostDashboard;
    }

    public function getPostsAwaitingList(){
        $dashboardPostManager = new DashboardPostManager();
        $getPostsAwaiting = $dashboardPostManager->getPostsAwaiting();
        return $getPostsAwaiting;
    }    

    public function recordPost($title, $content, $file_name, $file_description){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setPostAwaiting($title, $content, $file_name, $file_description);
    }

    public function publishPost($title, $content, $file_name, $file_description){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setPost($title, $content, $file_name, $file_description);
    }

    public function publishPostAwaiting($id){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setPostAwait($id);
    }

    public function updatePost($id, $title, $content, $file_name, $file_description){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setUpdatedPost($id, $title, $content, $file_name, $file_description);
    }

    public function deletePost($id){
        $this->deleteReportsForPost($id);
        $this->deleteCommentsForPost($id);
        $this->deleteThePost($id);
    }

    private function deleteReportsForPost($id){
        $post_concerned_id = $id;
        $dashboardReportManager = new DashboardReportManager();
        $dashboardReportManager->deletePostReports($post_concerned_id);
    }

    private function deleteCommentsForPost($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->deletePostComments($id);
    }

    public function deleteThePost($id){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->deletePost($id);
    }
}