<?php

namespace p4\blog\controller;
use p4\blog\model\PostManager as PostManager;

class PostController{
    
    public function getPosts(){
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        return $posts;
    }

    public function getPost(){
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        return $post;
    }
}