<?php

require 'vendor/autoload.php'; 

try{

    if(isset($_GET['action'])){

        if($_GET['action'] == 'viewPost'){
            
            if (isset($_GET['id']) && $_GET['id'] > 0){
                
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
                
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }else{
        $postController = new \p4\blog\controller\PostController();
        $postController->showPosts();
    }

    
}catch(Exception $e){
    echo 'erreur : ' . $e->getMessage();
    
}

