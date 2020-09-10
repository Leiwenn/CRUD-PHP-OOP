<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardManager as DashboardManager;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\PostManager as PostManager;

class DashboardController{

    public function showDashboard(){
        $title = 'Dashboard';
        $h1 = 'Dashboard';
        $linkHomeDashboard = 'Accueil Dashboard';
        $linkTiny = 'Editeur de texte';
        $linkComments = 'Commentaires à publier';
        $linkReports = 'Modération';
        $linkHome = 'Voir le site';
        $membersTitle = 'Membres';
        $commentsTitle = 'Commentaires à publier';
        $reportsTitle = 'Demandes de modération';
        $h2 = 'Billets en attente de publication';
        $h3 = 'Billets publiés';
        $linkSeePostAwaiting = 'Voir le billet enregistré';
        $linkSeePost = 'Voir le billet publié';
        $totalMembers = $this->totalMembers();
        $totalCommentsAwaiting = $this->totalCommentsAwaiting();
        $totalReports = $this->totalReports();
        $totalPostsAwaiting = $this->totalPostsAwaiting();
        $showPostsAwaiting = $this->getPostsAwaiting();
        $totalPosts = $this->totalPosts();
        $showPostsList = $this->getPosts();
        $content = require 'view/backOffice/dashboard.php';
        require 'view/backOffice/template.php';
    }

    // WIDGETS
    private function totalMembers(){
        $dashboardManager = new DashboardManager();
        $getTotalMembers = $dashboardManager->countMembers();
        return $getTotalMembers;
    }

    private function totalCommentsAwaiting(){
        $dashboardManager = new DashboardManager();
        $totalCommentsAwaiting = $dashboardManager->countCommentsAwaiting();
        return $totalCommentsAwaiting;
    }

    private function totalReports(){
        $dashboardManager = new DashboardManager();
        $totalReports = $dashboardManager->countReports();
        return $totalReports;
    }

    private function totalPostsAwaiting(){
        $dashboardManager = new DashboardManager();
        $totalPostsAwaiting = $dashboardManager->countPostsAwaiting();
        return $totalPostsAwaiting;
    }

    private function totalPosts(){
        $dashboardManager = new DashboardManager();
        $totalPosts = $dashboardManager->countPosts();
        return $totalPosts;
    }
    // END WIDGETS

    public function getPosts(){
        $dashboardPostManager = new DashboardPostManager();
        $showPostsList = $dashboardPostManager->getPostsInDashboard();
        return $showPostsList;
    }
    
    public function getPostsAwaiting(){
        $dashboardPostManager = new DashboardPostManager();
        $showPostsAwaiting = $dashboardPostManager->getPostsAwaiting();
        return $showPostsAwaiting;
    }
}