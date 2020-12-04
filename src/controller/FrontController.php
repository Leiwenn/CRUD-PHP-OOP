<?php

namespace p4\blog\controller;
use p4\blog\model\FrontManager as FrontManager;
use p4\blog\controller\PostController as PostController;
use p4\blog\controller\CommentController as CommentController;

class FrontController{

    private const H1 = 'JEAN FORTEROCHE';

    public function showHome(){
        $title = 'Blog de Jean FORTEROCHE';
        $h1 = self::H1;
        $h2 = 'Dernier épisode publié';
        $h4 = 'A PROPOS';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkArea = null;
            $linkLog = '<a class="nav-link text-white" data-toggle="modal" data-target="#connexion" href="#">Connexion</a>';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous faire aujourd\'hui ?';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous lire aujourd\'hui ?';
        }
        $showLastPost = $this->showLastPost();
        require 'view/frontOffice/template.php';
    }

    private function showLastPost(){
        $frontManager = new FrontManager();
        $showLastPost = $frontManager->getLastPost();
        return $showLastPost;
    }

    public function showPosts(){
        $title = 'Liste des épisodes';
        $h1 = self::H1;
        $h2 = 'Liste des épisodes';
        $linkReadMore = 'Lire la suite';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkArea = null;
            $linkLog = '<a class="nav-link text-white" data-toggle="modal" data-target="#connexion" href="#">Connexion</a>';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous faire aujourd\'hui ?';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous lire aujourd\'hui ?';
        }
        $posts = $this->getAllPosts();
        require 'view/frontOffice/template.php';
    }

    private function getAllPosts(){
        $postController = new PostController();
        $getAllPosts = $postController->getPosts();
        return $getAllPosts;
    }

    public function showPostsWithPagination($currentPage){
        $title = 'Liste des épisodes';
        $h1 = self::H1;
        $h2 = 'Liste des épisodes';
        $linkReadMore = 'Lire la suite';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkArea = null;
            $linkLog = '<a class="nav-link text-white" data-toggle="modal" data-target="#connexion" href="#">Connexion</a>';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous faire aujourd\'hui ?';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = 'Bonjour' . ' ' . htmlspecialchars($_SESSION['pseudo']);
            $message = 'Qu\'allez vous lire aujourd\'hui ?';
        }
        $nbrPages = $this->getNbrPages();
        $postsPagination = $this->getAllPostsPagination($currentPage);
        require 'view/frontOffice/template.php';
    }
    private function getAllPostsPagination($currentPage){
        $frontManager = new FrontManager();
        $postsWithPagination = $frontManager->getPostsWithPagination($currentPage);
        return $postsWithPagination;
    }
    private function getNbrPages(){
        $frontManager = new FrontManager();
        $totalPages = $frontManager->countNbrPages();
        return $totalPages;
    }

    public function showPost($postId){
        $title = 'Episode';
        $h1 = self::H1;
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        $linkBack = 'Retour à la liste';
        $h3 = 'Ajoutez votre commentaire';
        $help = 'Votre commentaire sera validé par Jean Forteroche avant publication';
        $h4 = 'Vos Commentaires';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkArea = null;
            $linkLog = '<a class="nav-link text-white" data-toggle="modal" data-target="#connexion" href="#">Connexion</a>';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = null;
            $message = 'Bonne lecture !';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = null;
            $message = 'Bonne lecture !';
        }
        $post = $this->getAPost($postId);
        $comments = $this->getTheComments($postId);
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
        $title = 'Mentions Légales';
        $h1 = self::H1;
        $h2 = 'Mentions Légales';
        $linkHome = 'Accueil';
        $linkPostsList = 'Liste des épisodes';
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $linkArea = null;
            $linkLog = '<a class="nav-link text-white" data-toggle="modal" data-target="#connexion" href="#">Connexion</a>';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = null;
            $message = 'Bonne lecture !';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $linkArea = '<a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>';
            $linkLog = '<a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>';
            $hello = null;
            $message = 'Bonne lecture !';
        }
        require 'view/frontOffice/template.php';
    }
}