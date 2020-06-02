<?php

//namespace ;

require_once 'model/PostManager.php';

class PostController{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showPosts(){
        $header = require 'view/frontOffice/header.php';
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $content = require 'view/frontOffice/postsView.php';
        require 'view/frontOffice/template.php';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showPost(){
        $header = require 'view/frontOffice/headerSingle.php';
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        $content = require 'view/frontOffice/postView.php';
        require 'view/frontOffice/template.php';
    }
    
}