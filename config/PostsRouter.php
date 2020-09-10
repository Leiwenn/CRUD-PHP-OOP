<?php

namespace p4\blog\config;
use Exception;

class PostsRouter{

    public function postsRouter(){

            if(isset($_GET['action'])){
                if($_GET['action'] == 'viewPosts'){
                    $this->viewPostsRoute();
                }elseif($_GET['action'] == 'viewPost'){
                    $this->viewPostRoute();
                }elseif($_GET['action'] == 'delete_Post'){
                    $this->deletePostRoute();
                }elseif($_GET['action'] == 'publish_Post_Awaiting'){
                    $this->publishPostAwaitingRoute();
                }elseif($_GET['action'] == 'delete_Post_Awaiting'){
                    $this->deletePostAwaitingRoute();
                }elseif($_GET['action'] == 'create_new_post'){
                    $this->createNewPostRoute();
                }elseif($_GET['action'] == 'edit_Post_Awaiting'){
                    $this->editPostAwaitingRoute();
                }elseif($_GET['action'] == 'update_post_awaiting'){
                    $this->updatePostAwaitingRoute();
                }elseif($_GET['action'] == 'edit_Post'){
                    $this->editPostRoute();
                }elseif($_GET['action'] == 'change_post'){
                    $this->changePostRoute();
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
    }

    private function viewPostsRoute(){
        $frontController = new \p4\blog\controller\FrontController();
        $frontController->showPosts();
    }

    private function viewPostRoute(){
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $postId = htmlspecialchars($_GET['id']);
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showPost($postId);
        }else{
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    private function deletePostRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['id']);
            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
            $dashboardPostController->deletePost($id);
            $this->showDashboardRoute();
        }
    }

    private function publishPostAwaitingRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['postId']);
            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
            $dashboardPostController->publishPostAwaiting($id);
            $this->showDashboardRoute();
        }
    }

    private function deletePostAwaitingRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['postId']);
            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
            $dashboardPostController->deletePostAwaiting($id);
            $this->showDashboardRoute();
        }
    }

    private function createNewPostRoute(){
        if($_SESSION['admin'] == true){
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            if(isset($_POST['record'])){
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->recordPost($title, $content);
                $this->showDashboardRoute();
            }elseif(isset($_POST['publish'])){
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_POST['file_name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->publishPost($title, $content, $file_name, $file_description);
                $this->showDashboardRoute();
            }
        }
    }

    private function editPostAwaitingRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['postId']);
            $tinyController = new \p4\blog\controller\TinyController();
            $tinyController->editPostAwaiting($id);
        }
    }

    private function updatePostAwaitingRoute(){
        if($_SESSION['admin'] == true){
            if(isset($_POST['record'])){
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->recordPost($title, $content);
                $this->showDashboardRoute();
            }elseif(isset($_POST['publish'])){
                $id = htmlspecialchars($_GET['id']);
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_POST['file_name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                $this->showDashboardRoute();
            }elseif(isset($_POST['delete'])){
                $id = htmlspecialchars($_GET['postId']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->deletePost($id);
                $this->showDashboardRoute();
            }
        }
    }

    private function editPostRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['id']);
            $tinyController = new \p4\blog\controller\TinyController();
            $tinyController->editPost($id);
        }
    }

    private function changePostRoute(){
        if($_SESSION['admin'] == true){
            if(isset($_POST['update'])){
                $id = htmlspecialchars($_GET['id']);
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_POST['file_name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                $this->showDashboardRoute();
            }elseif(isset($_POST['delete'])){
                $id = htmlspecialchars($_GET['postId']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->deletePost($id);
                $this->showDashboardRoute();
            }
        }
    }

    private function showDashboardRoute(){
        $dashboardController = new \p4\blog\controller\DashboardController();
        $dashboardController->showDashboard();
    }
}