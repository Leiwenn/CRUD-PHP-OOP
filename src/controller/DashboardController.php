<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
use p4\blog\model\DashboardManager as DashboardManager;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\PostManager as PostManager;

class DashboardController{

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
        $titleh2 = 'Billets en attente de publication';
        $totalPostsAwaiting = self::totalPostsAwaiting();
        $showPostsAwaiting = self::getPostsAwaiting();
        $titleh3 = 'Billets publiés';
        $totalPosts = self::totalPosts();
        $showPostsList = self::getPosts();
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
    public function getPosts(){
        $postManager = new PostManager();
        $showPostsList = $postManager->getPosts();
        return $showPostsList;
    }
    
    public function totalPostsAwaiting(){
        $dashboardManager = new DashboardManager();
        $totalPostsAwaiting = $dashboardManager->countPostsAwaiting();
        return $totalPostsAwaiting;
    }
    public function getPostsAwaiting(){
        $dashboardPostManager = new DashboardPostManager();
        $showPostsAwaiting = $dashboardPostManager->getPostsAwaiting();
        return $showPostsAwaiting;
    }

}