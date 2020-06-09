<?php

require 'vendor/autoload.php'; 

session_start();
$admin = null;

try{

    if(isset($_GET['action'])){

        /**
         * POSTS
         */
        if($_GET['action'] == 'viewPost'){
            
            if (isset($_GET['id']) && $_GET['id'] > 0){
                
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
                
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        /**
         * MEMBERS
         */
        if($_GET['action'] == 'registration'){

            if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['passwordConfirm']) AND isset($_POST['mail'])){

                $memberController = new \p4\blog\controller\MemberController();
                $memberController->getAllMembers();
                
                $dataDb = $memberController->getAllMembers();
                  
                while($data = $dataDb->fetch()){
                    if($_POST['pseudo'] == $data['pseudo']){
                        throw new Exception('Ce pseudo est déja utilisé, merci d\'en choisir un autre.');
                    }

                    if(!preg_match('#^[a-zA-Z0-9_]{3,16}$#', $_POST['pseudo'])){
                        throw new Exception('Le pseudo ne doit contenir que des lettres et des chiffres, et doit contenir entre 3 et 16 caractères.');
                    }

                    if($_POST['password'] == $_POST['passwordConfirm']){
                        if(preg_match('#^[a-zA-Z0-9]+$#', $_POST['password']) !== 1){
                            throw new Exception('Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres');
                        }
                    }else{
                        throw new Exception('Les deux môts de passe doivent être identiques !');
                    }

                    if($_POST['mail'] == $data['mail']){
                        throw new Exception('Cet EMAIL est déja utilisé, peut être êtes-vous déja membre !');
                    }
                    if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail'])){
                        throw new Exception('L\'adresse ' . $_POST['mail'] . ' n\'est pas valide');
                    }
                }

                $members_category = 2;
                $memberController->newMember($_POST['pseudo'], $_POST['mail'], $_POST['password'], 2);
                $_SESSION['pseudo'] = $_POST['pseudo'];
                $postController = new \p4\blog\controller\PostController();
                $postController->showPosts();

            }else{
                throw new Exception('Merci de remplir tous les champs !');
            }

        }

        if($_GET['action'] == 'login'){

            if(isset($_POST['pseudo']) && isset($_POST['password'])){

                $memberController = new \p4\blog\controller\MemberController();
                $memberController->getAllMembers();
                $dataDb = $memberController->getAllMembers();
                  
                while($data = $dataDb->fetch()){
                    
                    if($_POST['pseudo'] == $data['pseudo']){
                        
                        if(password_verify($_POST['password'], $data['passwordHache'])){
                            
                            if(isset($_POST['pseudo'])){                             
                                if($data['members_category'] == 1){
                                    $admin = true;
                                }elseif($data['members_category'] == 2){
                                    $admin = false;
                                }
                            }
                        }else{
                            throw new Exception('Mot de passe invalide');
                        }
                    }
                }
                /*if($admin == null){
                    throw new Exception("Ce pseudo n\'existe pas");
                }*/

                if(isset($_POST['checkbox'])){
                    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
                    setcookie('password', $_POST['password'], time() + 365*24*3600, null, null, false, true);
                }

                $_SESSION['pseudo'] = $_POST['pseudo'];
                
                if($admin == true){
                    $_SESSION['admin'] = true;
                    $postController = new \p4\blog\controller\PostController();
                    $postController->showPosts();
                }elseif($admin == false){
                    $_SESSION['admin'] = false;
                    $postController = new \p4\blog\controller\PostController();
                    $postController->showPosts();
                }else{
                    throw new Exception('Vous n\'êtes pas inscrit');
                }
                
            }

            if($_GET['action'] == 'disconnect'){
                $_SESSION['pseudo'] = null;
                //$memberController->disconnectMember();
            }

            if($_GET['action'] == 'unregistration'){
                $memberController->DeleteAMember();
            }

        }else{
            throw new Exception('Merci de remplir tous les champs !');
        }

    }else{
        $postController = new \p4\blog\controller\PostController();
        $postController->showPosts();
    }
    
}catch(Exception $e){
    echo 'erreur : ' . $e->getMessage();
    
}

