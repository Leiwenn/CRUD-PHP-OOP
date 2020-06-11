<?php

namespace p4\blog\controller;
use p4\blog\model\PostManager as PostManager;
use p4\blog\model\CommentManager as CommentManager;
require_once 'src/model/DbManager.php';

class PostController{

    /**
     * return all posts with template
     *
     * @return void
     */
    public function showPosts(){
        
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $header = require 'view/frontOffice/header.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $header = require 'view/frontOffice/headerAdmin.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $content = require 'view/frontOffice/postsView.php';
        require 'view/frontOffice/template.php';
    }

    /**
     * return one post with template
     *
     * @return void
     */
    public function showPost(){

        $header = require 'view/frontOffice/headerSingle.php';
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        $content = require 'view/frontOffice/postView.php';
        require 'view/frontOffice/template.php';
    }
    
}