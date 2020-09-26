<?php

namespace p4\blog\controller;
use p4\blog\model\FrontManager as FrontManager;
use p4\blog\model\DashboardManager as DashboardManager;
use p4\blog\controller\PostController as PostController;
use p4\blog\controller\CommentController as CommentController;

class FrontController{

    private const TITLE = 'Blog de Jean FORTEROCHE';
    private const H1 = 'JEAN FORTEROCHE';

    public function showHome(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Dernier épisode publié';
        $h4 = 'A PROPOS';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkLogin = 'Connection';
            $header = require 'view/frontOffice/header.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous faire aujourd\'hui ?';
            $header = require 'view/frontOffice/headerConnect.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous lire aujourd\'hui ?';
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $showLastPost = $this->showLastPost();
        $content = require 'view/frontOffice/home.php';
        $footer = require 'view/frontOffice/footer.php';
        require 'view/frontOffice/template.php';
    }

    private function showLastPost(){
        $frontManager = new FrontManager();
        $showLastPost = $frontManager->getLastPost();
        return $showLastPost;
    }

    public function showPosts(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'Liste des épisodes';
        $linkReadMore = 'Lire la suite';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkLogin = 'Connection';
            $linkSuscribe = 'S\'inscrire';
            $header = require 'view/frontOffice/headerSingle.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Qu\'allez vous faire aujourd\'hui ?';
            $header = require 'view/frontOffice/headerConnect.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Qu\'allez vous lire aujourd\'hui ?';
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $posts = $this->getAllPosts();
        $content = require 'view/frontOffice/postsView.php';
        $footer = require 'view/frontOffice/footer.php';
        require 'view/frontOffice/template.php';
    }

    private function getAllPosts(){
        $postController = new PostController();
        $getAllPosts = $postController->getPosts();
        return $getAllPosts;
    }

    public function showPost($postId){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        $linkBack = 'Retour à la liste';
        $h3 = 'Ajouter un commentaire';
        $h4 = 'Vos Commentaires';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkLogin = 'Connection';
            $linkSuscribe = 'S\'inscrire';
            $header = require 'view/frontOffice/headerSingle.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Bonne lecture !';
            $header = require 'view/frontOffice/headerConnect.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Bonne lecture !';
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $post = $this->getAPost($postId);
        $comments = $this->getTheComments($postId);
        $content = require 'view/frontOffice/postView.php';
        $footer = require 'view/frontOffice/footer.php';
        require 'view/frontOffice/template.php';
    }

    private function getAPost($postId){
        $postController = new PostController();
        $getAPost = $postController->getPost($postId);
        return $getAPost;
    }

    private function getTheComments($postId){
        $commentController = new CommentController();
        $getTheComments = $commentController->getComments($postId);
        return $getTheComments;
    }

    public function showLegalNotice(){
        $title = self::TITLE;
        $h1 = 'Jean Forteroche';
        $h2 = 'Mentions Légales';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkLogin = 'Connection';
            $linkSuscribe = 'S\'inscrire';
            $header = require 'view/frontOffice/headerSingle.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Bonne lecture !';
            $header = require 'view/frontOffice/headerConnect.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkDisconnect = 'Déconnexion';
            $hello = null;
            $message = 'Bonne lecture !';
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $content = require 'view/frontOffice/LegalNotice.php';
        $footer = require 'view/frontOffice/footer.php';
        require 'view/frontOffice/template.php';
    }
}