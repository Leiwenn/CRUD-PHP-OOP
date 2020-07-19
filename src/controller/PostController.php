<?php

namespace p4\blog\controller;
use p4\blog\model\PostManager as PostManager;
use p4\blog\model\CommentManager as CommentManager;
require_once 'src/model/DbManager.php';

class PostController{

    /**
     * POSTS show all posts where category is 1 = 'billet simple pour l'alaska'
     * manager _ getPosts()
     *
     * @return void
     */
    public function showPosts(){
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $header = require 'view/frontOffice/headerSingle.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $header = require 'view/frontOffice/headerAdmin.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $posts = self::getPosts();
        $content = require 'view/frontOffice/postsView.php';
        require 'view/frontOffice/template.php';
    }

    public function getPosts(){
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        return $posts;
    }

    /**
     * POSTS show one post where id && category is 1 = 'billet simple pour l'alaska'
     * manager _ getPost($postId)
     *
     * @return void
     */
    public function showPost(){
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $header = require 'view/frontOffice/headerSingle.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $header = require 'view/frontOffice/headerAdmin.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $post = self::getPost($_GET['id']);
        $comments = self::getComments($_GET['id']);
        $content = require 'view/frontOffice/postView.php';
        require 'view/frontOffice/template.php';
    }

    public function getPost(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        return $post;
    }

    public function getComments(){
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($_GET['id']);
        return $comments;
    }
    
}