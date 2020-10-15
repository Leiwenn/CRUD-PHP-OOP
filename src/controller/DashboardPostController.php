<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\PostManager as PostManager;
use p4\blog\model\DashboardReportManager as DashboardReportManager;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;
class DashboardPostController{ 

    public function showPostDashboard($id){
        $title = 'Billets';
        $h1 = 'Dashboard';
        $linkHomeDashboard = 'Accueil Dashboard';
        $linkTiny = 'Editeur de texte';
        $linkHome = 'Voir le site';
        $linkDisconnect = '<i class="fas fa-sign-out-alt" title="déconnexion"></i>';
        $h2 = 'Modifier le billet';
        $linkEdit = 'Editer';
        $linkDelete = 'Supprimer';
        $showPostDashboard = $this->getPostDashboard($id);
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
        $this->setThePostAwait($id);
        $this->updateTheDate($id);
    }

    private function setThePostAwait($id){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setPostAwait($id);
    }

    private function updateTheDate($id){
        $dashboardPostManager = new DashboardPostManager();
        $dashboardPostManager->setUpdatedDate($id);
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