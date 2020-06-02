<?php

require 'controller/PostController.php';


try{

    if(isset($_GET['action'])){

        if($_GET['action'] == 'viewPost'){
            
            if (isset($_GET['id']) && $_GET['id'] > 0){
                
                $postController = new PostController();
                $postController->showPost();
                
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }else{
        $postController = new PostController();
        $postController->showPosts();
    }

    
}catch(Exception $e){
    echo 'erreur : ' . $e->getMessage();
    
}

