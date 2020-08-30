<?php

namespace p4\blog\controller;
use p4\blog\controller\DashboardPostController as DashboardPostController;

class TinyController{

    public const TITLE = 'Editeur de texte';
    public const H1 = 'Dashboard';
    public const LINK = 'Accueil Dashboard';

    public function showEditor(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Nouveau billet';
        $link = self::LINK;
        $help = 'Le texte alternatif est lu par les lecteurs d\'écrans (accessibilité), s\'affiche par défaut en remplacement de l\'image lorsque celle-ci ne peut être affichée sur une page web, il est aussi utile pour le référencement de votre billet (SEO).</br>Image et texte alternatifs seront obligatoires pour publier le billet';
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/tiny.php';
        require 'view/backOffice/templateTiny.php';
    }

    public function editPostAwaiting($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Editer un billet non publié';
        $help = 'Le texte alternatif est lu par les lecteurs d\'écrans (accessibilité), s\'affiche par défaut en remplacement de l\'image lorsque celle-ci ne peut être affichée sur une page web, il est aussi utile pour le référencement de votre billet (SEO).</br>Image et texte alternatifs seront obligatoires pour publier le billet';
        $link = self::LINK;
        $dashboardPostController = new DashboardPostController();
        $getPostAwaiting = $dashboardPostController->getPostAwaiting($id);
        $header = require 'view/backOffice/headerTiny.php';
        $content = require 'view/backOffice/editPostAwaiting.php';
        require 'view/backOffice/templateTiny.php';
    }

    public function editPost($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Editer un billet déja publié';
        $help = 'Le texte alternatif est lu par les lecteurs d\'écrans (accessibilité), s\'affiche par défaut en remplacement de l\'image lorsque celle-ci ne peut être affichée sur une page web, il est aussi utile pour le référencement de votre billet (SEO).</br>Image et texte alternatifs seront obligatoires pour publier le billet';
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