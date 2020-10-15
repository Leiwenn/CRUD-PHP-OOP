<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardManager as DashboardManager;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\MemberManager as MemberManager;

class DashboardController{

    private const LINKHOMEDASHBOARD = 'Accueil Dashboard';
    private const LINKTINY = 'Editeur de texte';
    private const LINKHOME = 'Voir le site';
    private const LINKDISCONNECT = '<i class="fas fa-sign-out-alt" title="déconnexion"></i>';

    public function showDashboard(){
        $title = 'Dashboard';
        $h1 = 'Dashboard';
        $linkHomeDashboard = self::LINKHOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $linkDisconnect = self::LINKDISCONNECT;
        $membersTitle = 'Membres';
        $commentsTitle = 'Commentaires';
        $reportsTitle = 'Modération';
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
    
    private function getPostsAwaiting(){
        $dashboardPostController = new DashboardPostController();
        $showPostsAwaiting = $dashboardPostController->getPostsAwaitingList();
        return $showPostsAwaiting;
    }

    public function showMemberList(){
        $title = 'Membres';
        $linkHomeDashboard = self::LINKHOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $linkDisconnect = self::LINKDISCONNECT;
        $h1 = 'Liste des membres';
        $h2 = 'Membres actuels';
        $memberList = $this->getMembersList();
        require 'view/backOffice/template.php';
    }

    private function getMembersList(){
        $memberManager = new MemberManager();
        $getMembersList = $memberManager->getMemberList();
        return $getMembersList;
    }
}