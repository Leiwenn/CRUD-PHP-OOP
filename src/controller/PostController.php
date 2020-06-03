<?php

namespace p4\blog\controller;
use p4\blog\model\PostManager as PostManager;
require_once 'src/model/DbManager.php';

class PostController{

    /**
     * return all posts with template
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
     * return one post with template
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