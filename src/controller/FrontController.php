<?php

namespace p4\blog\controller;
use p4\blog\model\FrontManager as FrontManager;
use p4\blog\controller\PostController as PostController;
use p4\blog\controller\CommentController as CommentController;

class FrontController{

    public const TITLE = 'Blog de Jean FORTEROCHE';
    public const H1 = 'JEAN FORTEROCHE';

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
        $showLastPost = self::showLastPost();
        $content = require 'view/frontOffice/home.php';
        require 'view/frontOffice/template.php';
    }
    public function showLastPost(){
        $frontManager = new FrontManager();
        $showLastPost = $frontManager->getLastPost();
        return $showLastPost;
    }

    public function showPosts(){
        $title = self::TITLE;
        $h1 = self::H1;
        $h2 = 'BILLET SIMPLE POUR L\'ALASKA';
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
        $postController = new PostController();
        $posts = $postController->getPosts();
        $content = require 'view/frontOffice/postsView.php';
        require 'view/frontOffice/template.php';
    }

    public function showPost(){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        $linkBack = 'Retour à la liste';
        $h3 = 'Ajouter un commentaire';
        $h4 = 'Commentaires';
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
        $postController = new PostController();
        $post = $postController->getPost($_GET['id']);
        $commentController = new CommentController();
        $comments = $commentController->getComments($_GET['id']);
        $content = require 'view/frontOffice/postView.php';
        require 'view/frontOffice/template.php';
    }
}