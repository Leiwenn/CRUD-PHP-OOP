<?php

require 'vendor/autoload.php'; 

session_start();
$admin = null;

try{

    if(isset($_GET['action'])){

        /**
         * ---- REGISTRATION _ LOGIN _ LOGOUT ----
         */
        if($_GET['action'] == 'registration'){
            if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['passwordConfirm']) AND isset($_POST['mail'])){
                $memberController = new \p4\blog\controller\MemberController();
                $pseudo = $_POST['pseudo'];
                $memberController->getMember($pseudo);
                $dataDb = $memberController->getMember($pseudo);
                
                while($data = $dataDb->fetch()){

                    if($_POST['pseudo'] === $data['pseudo']){
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

        elseif($_GET['action'] == 'login'){
            if(isset($_POST['pseudo']) && isset($_POST['password'])){
                $memberController = new \p4\blog\controller\MemberController();
                $pseudo = $_POST['pseudo'];
                $memberController->getMember($pseudo);
                $dataDb = $memberController->getMember($pseudo);

                while($data = $dataDb->fetch()){
                    if($_POST['pseudo'] === $data['pseudo']){
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
                    }else{
                        throw new Exception('Ce pseudo n\'existe pas');
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

        elseif($_GET['action'] == 'disconnect'){
            $midOfficeController = new \p4\blog\controller\MidOfficeController();
            $midOfficeController->disconnectMember();
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showHome();
        }
        /**
         * ---- END REGISTRATION _ LOGIN _ LOGOUT ----
         */

        /**
         * ---- MEMBER AREA ----
         */ 
        elseif($_GET['action'] == 'member_area'){
            if(isset($_SESSION['pseudo'])){
                $pseudo = $_SESSION['pseudo'];
                $midOfficeController = new \p4\blog\controller\MidOfficeController();
                $midOfficeController->showMemberArea($pseudo);
            }
        }
        elseif($_GET['action'] == 'change_pseudo'){
            if(isset($_SESSION['pseudo'])){
                $oldPseudo = $_SESSION['pseudo'];
                $newPseudo = $_POST['newPseudo'];
                $memberController = new \p4\blog\controller\MemberController();
                $memberController->updatePseudo($oldPseudo, $newPseudo);
                $midOfficeController = new \p4\blog\controller\MidOfficeController();
                $midOfficeController->showMemberArea($pseudo);
            }
        }
        elseif($_GET['action'] == 'change_password'){
            $passwordCorrect = false;
            if(isset($_SESSION['pseudo']) && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
                $pseudo = $_SESSION['pseudo'];
                $currentPassword = $_POST['currentPassword'];
                $newPassword = $_POST['newPassword'];
                $confirmPassword = $_POST['confirmPassword'];

                $memberController = new \p4\blog\controller\MemberController();
                $memberController->getMember($pseudo);
                $dataDb = $memberController->getMember($pseudo);
                
                while($data = $dataDb->fetch()){
                    if(password_verify($currentPassword, $data['passwordHache'])){
                        if($newPassword === $confirmPassword){
                            if(preg_match('#^[a-zA-Z0-9]+$#', $newPassword) !== 1){
                                throw new Exception('Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres');
                            }else{
                                $passwordCorrect = true;
                            }
                        }else{
                            throw new Exception('Les deux mots de passe doivent être identiques !');
                        }
                    }else{
                        throw new Exception('Mot de passe invalide');
                    }
                }

                if($passwordCorrect = true){
                    $memberController->changePassword($pseudo, $newPassword);
                    $midOfficeController = new \p4\blog\controller\MidOfficeController();
                    $midOfficeController->disconnectMember($pseudo);
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showHome();
                }
                
            }else{
                throw new Exception('Merci de remplir tous les champs !');
            }
            
        }

        elseif($_GET['action'] == 'unregistration'){
            $pseudo = $_SESSION['pseudo'];
            $midOfficeController = new \p4\blog\controller\MidOfficeController();
            $midOfficeController->deleteMember($pseudo);
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showHome();
        }
        /**
         * ---- END MEMBER AREA ----
         */ 

        /**
         * ---- POSTS ----
         */
        elseif($_GET['action'] == 'viewPosts'){
            $postController = new \p4\blog\controller\PostController();
            $postController->showPosts();
        }
        
        elseif($_GET['action'] == 'viewPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        /**
         * ---- END POSTS ----
         */

        /**
         * ---- COMMENTS ----
         */
        elseif($_GET['action'] == 'comment'){
            if(isset($_SESSION['pseudo'])){
                $pseudo = $_SESSION['pseudo'];
                $title = $_POST['title'];
                $comment = $_POST['comment'];
                $postId = $_GET['postId'];
                $commentController = new \p4\blog\controller\CommentController();
                $commentController->addComment($pseudo, $title, $comment, $postId);
                $_GET['id'] = $postId;
                $postController = new \p4\blog\controller\PostController();
                $postController->showPost();
            }else{
                throw new Exception('Seuls les membres inscrits peuvent commenter un article');
            }
        }

        elseif($_GET['action'] == 'report'){
            if(isset($_SESSION['pseudo'])){
                $commentController = new \p4\blog\controller\CommentController();
                $comment_id = $_GET['comment_id'];
                $member_pseudo = $_SESSION['pseudo'];
                $post_concerned_id = $_GET['post_concerned_id'];
                $commentController->addReport($comment_id, $member_pseudo, $post_concerned_id);
                $postController = new \p4\blog\controller\PostController();
                $_GET['id'] = $_GET['post_concerned_id'];
                $postController->showPost();
            }else{
                throw new Exception('Seuls les membres inscrits peuvent signaler un commentaire');
            }
        }
        /**
         * ---- END COMMENTS ----
         */

        /**
         *  ---- DASHBOARD ----
         */
        elseif($_GET['action'] == 'dashboard'){
            if($_SESSION['admin'] = true){
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }

        elseif($_GET['action'] == 'text_editor'){
            if($_SESSION['admin'] = true){
                $tinyController = new \p4\blog\controller\TinyController();
                $tinyController->showEditor();
            }
        }
        elseif($_GET['action'] == 'create_new_post'){
            if($_SESSION['admin'] = true){
                // recordPost || publishPost
                $title = $_POST['title'];
                $content = $_POST['content'];
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->recordPost($title, $content);
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }
        elseif(isset($_POST['publish'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $file_name = $_POST['file_name'];
            $file_description = $_POST['file_description'];
            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
            $dashboardPostController->publishPost($title, $content, $file_name, $file_description);
            $dashboardController = new \p4\blog\controller\DashboardController();
            $dashboardController->showDashboard();
        }
        elseif($_GET['action'] == 'view_Post_Awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->showPostAwaiting($id);
            }
        }
        elseif($_GET['action'] == 'edit_Post_Awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['postId'];
                $tinyController = new \p4\blog\controller\TinyController();
                $tinyController->editPostAwaiting($id);
            }
        }
        elseif($_GET['action'] == 'update_post_awaiting'){
            if($_SESSION['admin'] = true){
                if(isset($_POST['record'])){
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->recordPost($title, $content);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }elseif(isset($_POST['publish'])){
                    $id = $_GET['id'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $file_name = $_POST['file_name'];
                    $file_description = $_POST['file_description'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                    $dashboardPostController->deletePostAwaiting($id);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }elseif(isset($_POST['delete'])){
                    $id = $_GET['postId'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->deletePost($id);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }
                
            }
        }
        elseif($_GET['action'] == 'view_Post_Dashboard'){
            if($_SESSION['admin'] = true){
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    $postId = $_GET['id'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->showPostDashboard($postId);
                }else{
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
        }
        elseif($_GET['action'] == 'edit_Post'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $tinyController = new \p4\blog\controller\TinyController();
                $tinyController->editPost($id);
            }
        }
        elseif($_GET['action'] == 'change_post'){
            if($_SESSION['admin'] = true){
                
                if(isset($_POST['update'])){
                    $id = $_GET['id'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $file_name = $_POST['file_name'];
                    $file_description = $_POST['file_description'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }elseif(isset($_POST['delete'])){
                    $id = $_GET['postId'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->deletePost($id);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }
            }
        }
        elseif($_GET['action'] == 'delete_Post'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->deletePost($id);
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }


        elseif($_GET['action'] == 'publish_Post_Awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['postId'];
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->publishPostAwaiting($id);
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }
        
        elseif($_GET['action'] == 'delete_Post_Awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['postId'];
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->deletePostAwaiting($id);
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }

        

        
        

        // REPORTS
        elseif($_GET['action'] == 'show_reports'){
            if($_SESSION['admin'] = true){
                $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                $dashboardReportController->showReports();
            }
        }
        elseif($_GET['action'] == 'show_a_report'){
            if($_SESSION['admin'] = true){
                $rid = $_GET['rid'];
                $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                $dashboardReportController->showReportedComment($rid);
            }
        }
        elseif($_GET['action'] == 'keep_comment'){
            if($_SESSION['admin'] = true){
                $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                $id = $_GET['comment_id'];
                $dashboardReportController->keepAComment($id);
                $dashboardReportController->showReports();
            }
        }
        elseif($_GET['action'] == 'delete_comment'){
            if($_SESSION['admin'] = true){
                $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                $rid = $_GET['rid'];
                $dashboardReportController->deleteReport($rid);
                $id = $_GET['comment_id'];
                $dashboardReportController->deleteComment($id);
                $dashboardReportController->showReports();
            }
        }
        elseif($_GET['action'] == 'exclude_member'){
            if($_SESSION['admin'] = true){
                $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                $pseudo = $_GET['pseudo'];
                $id = $_GET['comment_id'];
                $rid = $_GET['rid'];
                $dashboardReportController->deleteMember($pseudo);
                $dashboardReportController->deleteComment($id);
                $dashboardReportController->deleteReport($rid);
                $dashboardController = new \p4\blog\controller\DashboardController();
                $dashboardController->showDashboard();
            }
        }

        //COMMENTS
        elseif($_GET['action'] == 'comments_awaiting'){
            if($_SESSION['admin'] = true){
                $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                $dashboardCommentController->showCommentsAwaiting();
            }
        }
        elseif($_GET['action'] == 'publish_comment'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                $dashboardCommentController->publishComment($id);
                $dashboardCommentController->showCommentsAwaiting();
            }
        }
        elseif($_GET['action'] == 'delete_comment_awaiting'){
            if($_SESSION['admin'] = true){
                $id = $_GET['id'];
                $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                $dashboardCommentController->deleteCommentAwaiting($id);
                $dashboardCommentController->showCommentsAwaiting();
            }
        }
        /**
         *  ---- END DASHBOARD ----
         */

        else{
            http_response_code(404);
        }
    }else{
        $frontController = new \p4\blog\controller\FrontController();
        $frontController->showHome();
    }
    
}catch(Exception $e){
    require 'error.php';
}