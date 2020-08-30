<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
use p4\blog\model\PostManager as PostManager;

class DashboardPostController{

    public const TITLE = 'Billets';
    public const H1 = 'Dashboard';
    public const HOMEDASHBOARD = 'Accueil Dashboard';
    public const LINKTINY = 'Editeur de texte';
    public const LINKCOMMENTS = 'Commentaires à publier';
    public const LINKREPORTS = 'Modération';
    public const LINKHOME = 'Voir le site';

    public function showPostDashboard($postId){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkComments = self::LINKCOMMENTS;
        $linkReports = self::LINKREPORTS;
        $linkHome = self::LINKHOME;
        $h2 = 'Modifier le billet';
        $linkEdit = 'Editer';
        $linkDelete = 'Supprimer';
        $showPostDashboard = self::getPostDashboard($postId);
        $content = require 'view/backOffice/postDashboard.php';
        require 'view/backOffice/template.php'; 
    }
    public function getPostDashboard($postId){
        $postManager = new PostManager();
        $getPostDashboard = $postManager->getPost($postId);
        return $getPostDashboard;
    }

    /**
     * see one post_awaiting in dashboard
     *
     * @param [type] $id
     * @return void
     */
    public function showPostAwaiting($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkComments = self::LINKCOMMENTS;
        $linkReports = self::LINKREPORTS;
        $linkHome = self::LINKHOME;
        $showPostAwaiting = self::getPostAwaiting($id);
        $h2 = 'Billet en attente de publication';
        $content = require 'view/backOffice/postAwaiting.php';
        require 'view/backOffice/template.php'; 
    }
    public function getPostAwaiting($id){
        $dashboardPostManager = new DashboardPostManager();
        $getPostsAwaiting = $dashboardPostManager->getPostAwaiting($id);
        return $getPostsAwaiting;
    }

    /**
     * get list in dashboard
     *
     * @return void
     */
    public function getPostsAwaiting(){
        $dashboardPostManager = new DashboardPostManager();
        $getPostsAwaiting = $dashboardPostManager->getPostsAwaiting();
        return $getPostsAwaiting;
    }    

    public function recordPost($title, $content){
        $dashboardPostManager = new DashboardPostManager();
        $recordPost = $dashboardPostManager->setPostAwaiting($title, $content);
        return $recordPost;
    }

    public function publishPost($title, $content, $file_name, $file_description){
        $dashboardPostManager = new DashboardPostManager();
        $publishNewPost = $dashboardPostManager->setPost($title, $content, $file_name, $file_description);
        return $publishNewPost;
    }

    public function publishPostAwaiting($id){
        $dashboardPostManager = new DashboardPostManager();
        $publishPostAwaiting = $dashboardPostManager->setPostAwait($id);
        return $publishPostAwaiting;
    }

    public function updatePost($id, $title, $content, $file_name, $file_description){
        $dashboardPostManager = new DashboardPostManager();
        $publishNewPost = $dashboardPostManager->setUpdatedPost($id, $title, $content, $file_name, $file_description);
        return $publishNewPost;
    }

    public function deletePostAwaiting($id){
        $dashboardPostManager = new DashboardPostManager();
        $deletePostAwaiting = $dashboardPostManager->deletePostAwaiting($id);
        return $deletePostAwaiting;
    }

    public function deletePost($id){
        $dashboardPostManager = new DashboardPostManager();
        $deletePost = $dashboardPostManager->deletePost($id);
        return $deletePost;
    }
}