<?php

namespace p4\blog\controller;
use p4\blog\controller\DashboardPostController as DashboardPostController;

class TinyController{

    public const TITLE = 'Editeur de texte';
    public const H = 'Dashboard';
    public const LINK = 'Accueil Dashboard';

    public function showEditor(){
        $title = self::TITLE;
        $h1 = self::H;
        $link = self::LINK;
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/tiny.php';
        require 'view/backOffice/templateTiny.php';
    }

    public function editPostAwaiting($id){
        $title = self::TITLE;
        $h1 = self::H;
        $h2 = 'Editer un billet non publié';
        $link = self::LINK;
        $dashboardPostController = new DashboardPostController();
        $getPostAwaiting = $dashboardPostController->getPostAwaiting($id);
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/editPostAwaiting.php';
        require 'view/backOffice/templateTiny.php';
    }

    public function editPost($id){
        $title = self::TITLE;
        $h1 = self::H;
        $h2 = 'Editer un billet déja publié';
        $link = self::LINK;
        $editPost = self::getAPost($id);
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/editPost.php';
        require 'view/backOffice/templateTiny.php';
    }
    public function getAPost($id){
        $postId = $id;
        $dashboardPostController = new DashboardPostController();
        $getAPost = $dashboardPostController->getPostDashboard($postId);
        return $getAPost;
    }

}