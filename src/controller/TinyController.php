<?php

namespace p4\blog\controller;
use p4\blog\controller\DashboardPostController as DashboardPostController;

class TinyController{

    private const TITLE = 'Editeur de texte';
    private const H1 = 'Dashboard';
    private const LINK = 'Accueil Dashboard';
    private const IMGHELP = 'Format 1280 x 853 pour conserver la mise en page actuelle';
    private const HELP = 'Le texte alternatif est lu par les lecteurs d\'écrans (accessibilité), s\'affiche par défaut en remplacement de l\'image lorsque celle-ci ne peut être affichée sur une page web, il est aussi utile pour le référencement de votre billet (SEO).';

    public function showEditor(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Nouveau billet';
        $link = self::LINK;
        $imgHelp = self::IMGHELP;
        $altHelp = self::HELP;
        $header = require 'view/backOffice/tinyHeader.php';
        $content = require 'view/backOffice/tinyContent.php';
        require 'view/backOffice/tinyTemplate.php';
    }

    public function editPost($id){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Editer un billet';
        $imgHelp = self::IMGHELP;
        $altHelp = self::HELP;
        $link = self::LINK;
        $editPost = $this->getAPost($id);
        $header = require 'view/backOffice/tinyHeader.php';
        $content = require 'view/backOffice/tinyEditPost.php';
        require 'view/backOffice/tinyTemplate.php';
    }

    private function getAPost($id){
        $postId = $id;
        $dashboardPostController = new DashboardPostController();
        $getAPost = $dashboardPostController->getPostDashboard($postId);
        return $getAPost;
    }
}