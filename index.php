<?php

require 'vendor/autoload.php'; 

session_start();
$admin = null;

try{

    if(isset($_GET['action'])){

        /**
         * POSTS
         */
        if($_GET['action'] == 'viewPosts'){
            $postController = new \p4\blog\controller\PostController();
            $postController->showPosts();
        }
        if($_GET['action'] == 'viewPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        /**
         * COMMENTS
         */
        if($_GET['action'] == 'comment'){
            if(isset($_SESSION['pseudo'])){
                $postId = $_GET['postId'];
                $pseudo = $_SESSION['pseudo'];
                $title = $_POST['title'];
                $comment = $_POST['comment'];

                $commentController = new \p4\blog\controller\CommentController();
                $commentController->addComment($postId, $pseudo, $title, $comment);
                $_GET['id'] = $postId;
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
            }else{
                throw new Exception('Seuls les membres inscrits peuvent commenter un article');
            }
        }

        if($_GET['action'] == 'report'){
            if(isset($_SESSION['pseudo'])){
                $postId = $_GET['postId'];
                
                $pseudo = $_SESSION['pseudo'];
                $commentController = new \p4\blog\controller\CommentController();
                $commentController->addReport($postId, $pseudo);
                $_GET['id'] = $postId;
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
            }else{
                throw new Exception('Seuls les membres inscrits peuvent signaler un commentaire');
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
                    //var_dump($data);    //return only the last member idem ligne 122
                    //die;
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

                $_SESSION['admin'] = false;

                $memberController->newMember($_POST['pseudo'], $_POST['mail'], $_POST['password'], 2);
                $_SESSION['pseudo'] = $_POST['pseudo'];
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();

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
                    //var_dump($data);    //return only the last member
                    //die;
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

                if(isset($_POST['checkbox'])){
                    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
                    setcookie('password', $_POST['password'], time() + 365*24*3600, null, null, false, true);
                }

                $_SESSION['pseudo'] = $_POST['pseudo'];
                
                if($admin == true){
                    $_SESSION['admin'] = true;
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showHome();
                }elseif($admin == false){
                    $_SESSION['admin'] = false;
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showHome();
                }elseif($admin == null){
                    throw new Exception('Vous n\'êtes pas inscrit');
                }
            }else{
                throw new Exception('Merci de remplir tous les champs !');
            }
        }

        if($_GET['action'] == 'member_area'){
            $midOfficeController = new \p4\blog\controller\MidOfficeController();
            $midOfficeController->showMemberArea();
        }
        if($_GET['action'] == 'change_password'){

        }
        if($_GET['action'] == 'unregistration'){
            $memberController = new \p4\blog\controller\MemberController();
            $memberController->DeleteAMember();
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showHome();
        }

        /**
         *  ---- DASHBOARD ----
         */
        if($_GET['action'] == 'dashboard'){
            if($_SESSION['admin'] = true){
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }

        if($_GET['action'] == 'text_editor'){
            if($_SESSION['admin'] = true){
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showEditor();
            }
        }

        // REPORTS
        if($_GET['action'] == 'show_reports'){
            if($_SESSION['admin'] = true){
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showReports();
            
            }
        }
        if($_GET['action'] == 'show_a_report'){
            if($_SESSION['admin'] = true){
                $id = $_GET['rid'];
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showReport($id);
            }
        }
        if($_GET['action'] == 'delete_comment'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->deleteAComment($id);
            }
        }
        if($_GET['action'] == 'keep_comment'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->keepAComment($id);
            }
        }
        // END REPORTS

        //COMMENTS
        if($_GET['action'] == 'comments_awaiting'){
            if($_SESSION['admin'] = true){
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showCommentsAwaiting();
            }
        }
        if($_GET['action'] == 'publish_comment'){
            if($_SESSION['admin'] = true){
                $post_id = $_GET['post_id'];
                $pseudo = $_GET['pseudo'];
                $title = $_GET['title'];
                $comment = $_GET['comment'];
                $comment_date = $_GET['comment_date'];
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->addComment($pseudo, $title, $comment, $comment_date, $post_id);
                $dashboardController->showCommentsAwaiting();
            }
        }
        if($_GET['action'] == 'delete_comment_awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->deleteComment($id);
                $dashboardController->showCommentsAwaiting();
            }
        }
        // END COMMENTS

        /**
         * MEMBERS AND ADMIN
         */
        if($_GET['action'] == 'disconnect'){
            $memberController = new \p4\blog\controller\MemberController();
            $memberController->disconnectMember();
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showHome();
        }

        

    }else{
        $frontController = new \p4\blog\controller\FrontController();
        $frontController->showHome();
    }
    
}catch(Exception $e){
    echo 'erreur : ' . $e->getMessage();
    
}