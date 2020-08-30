<?php

namespace p4\blog\config;
use Exception;

class PostsRouter{

    public function postsRouter(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'viewPosts'){
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showPosts();
                }elseif($_GET['action'] == 'viewPost'){

                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        $frontController = new \p4\blog\controller\FrontController();
                        $frontController->showPost();
                    }else{
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }elseif($_GET['action'] == 'delete_Post'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['id'];
                        $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                        $dashboardPostController->deletePost($id);
                        $dashboardController = new \p4\blog\controller\DashboardController();
                        $dashboardController->showDashboard();
                    }
                }elseif($_GET['action'] == 'publish_Post_Awaiting'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['postId'];
                        $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                        $dashboardPostController->publishPostAwaiting($id);
                        $dashboardController = new \p4\blog\controller\DashboardController();
                        $dashboardController->showDashboard();
                    }
                }elseif($_GET['action'] == 'delete_Post_Awaiting'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['postId'];
                        $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                        $dashboardPostController->deletePostAwaiting($id);
                        $dashboardController = new \p4\blog\controller\DashboardController();
                        $dashboardController->showDashboard();
                    }
                }elseif($_GET['action'] == 'create_new_post'){
                    if($_SESSION['admin'] = true){
                        $title = $_POST['title'];
                        $content = $_POST['content'];
                        if(isset($_POST['record'])){
                            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                            $dashboardPostController->recordPost($title, $content);
                            $dashboardController = new \p4\blog\controller\DashboardController();
                            $dashboardController->showDashboard();
                        }elseif(isset($_POST['publish'])){
                            $id = $_GET['id'];
                            $file_name = $_POST['file_name'];
                            $file_description = $_POST['file_description'];
                            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                            $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                            $dashboardController = new \p4\blog\controller\DashboardController();
                            $dashboardController->showDashboard();
                        }
                    }
                }elseif(isset($_POST['publish'])){
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $file_name = $_POST['file_name'];
                    $file_description = $_POST['file_description'];
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->publishPost($title, $content, $file_name, $file_description);
                    $dashboardController = new \p4\blog\controller\DashboardController();
                    $dashboardController->showDashboard();
                }elseif($_GET['action'] == 'edit_Post_Awaiting'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['postId'];
                        $tinyController = new \p4\blog\controller\TinyController();
                        $tinyController->editPostAwaiting($id);
                    }
                }elseif($_GET['action'] == 'update_post_awaiting'){
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
                }elseif($_GET['action'] == 'edit_Post'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['id'];
                        $tinyController = new \p4\blog\controller\TinyController();
                        $tinyController->editPost($id);
                    }
                }elseif($_GET['action'] == 'change_post'){
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
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
        }catch(Exception $e){
            echo 'erreur : ' . $e->getMessage();
            require 'error.php';
        }
    }
}