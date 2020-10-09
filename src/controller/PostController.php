<?php

namespace p4\blog\controller;
use p4\blog\model\PostManager as PostManager;

class PostController{
    
    public function getPosts(){
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        return $posts;
    }

    public function getPost($postId){
        $postManager = new PostManager();
        $id =$postId;
        $post = $postManager->getPost($id);
        return $post;
    }
}