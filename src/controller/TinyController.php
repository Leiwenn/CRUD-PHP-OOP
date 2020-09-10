<?php

namespace p4\blog\controller;
use p4\blog\controller\DashboardPostController as DashboardPostController;

class TinyController{

    private const TITLE = 'Editeur de texte';
    private const H1 = 'Dashboard';
    private const LINK = 'Accueil Dashboard';
    private const HELP = 'Le texte alternatif est lu par les lecteurs d\'écrans (accessibilité), s\'affiche par défaut en remplacement de l\'image lorsque celle-ci ne peut être affichée sur une page web, il est aussi utile pour le référencement de votre billet (SEO).';

    public function showEditor(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Nouveau billet';
        $link = self::LINK;
        $help = self::HELP;
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/tiny.php';
        require 'view/backOffice/templateTiny.php';
    }

    public function editPostAwaiting($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Editer un billet non publié';
        $help = self::HELP;
        $link = self::LINK;
        $getPostAwaiting = $this->getThePostAwaiting($id);
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/editPostAwaiting.php';
        require 'view/backOffice/templateTiny.php';
    }

    private function getThePostAwaiting($id){
        $dashboardPostController = new DashboardPostController();
        $getThePostAwaiting = $dashboardPostController->getPostAwaiting($id);
        return $getThePostAwaiting;
    }

    public function editPost($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Editer un billet déja publié';
        $help = self::HELP;
        $link = self::LINK;
        $editPost = $this->getAPost($id);
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/editPost.php';
        require 'view/backOffice/templateTiny.php';
    }

    private function getAPost($id){
        $postId = $id;
        $dashboardPostController = new DashboardPostController();
        $getAPost = $dashboardPostController->getPostDashboard($postId);
        return $getAPost;
    }
}