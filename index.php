<?php

require 'vendor/autoload.php'; 

session_start();

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

        if($_GET['action'] == 'registration'){

            if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['passwordConfirm']) AND isset($_POST['mail'])){

                $memberController = new \p4\blog\controller\MemberController();
                $memberController->getAllMembers();
                
                /*while($data = $memberController->getAllMembers()->fetch()){

                    
                }*/

            }else{
                throw new Exception('Merci de remplir tous les champs !');
            }

        }

        if($_GET['action'] == 'login'){

            if(isset($_POST['pseudo']) && isset($_POST['password'])){

                $memberController = new \p4\blog\controller\MemberController();
                $memberController->getAllMembers();

                /*while($data = $memberController->getAllMembers()->fetch()){

                    
                }*/

            }else{
                throw new Exception('Merci de remplir tous les champs !');
            }
        }

    }else{
        $postController = new \p4\blog\controller\PostController();
        $postController->showPosts();
    }
    
}catch(Exception $e){
    echo 'erreur : ' . $e->getMessage();
    
}

