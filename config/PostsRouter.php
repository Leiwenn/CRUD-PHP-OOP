<?php

namespace p4\blog\config;
use Exception;

class PostsRouter{

    public function postsRouter(){

        if(isset($_GET['action'])){
            if($_GET['action'] == 'create_new_post'){
                $this->createNewPostRoute();
            }elseif($_GET['action'] == 'edit_post'){
                $this->editPostRoute();
            }elseif($_GET['action'] == 'update_post'){
                $this->updatePostRoute();
            }elseif($_GET['action'] == 'publish_post_awaiting'){
                $this->publishPostAwaitingRoute();
            }elseif($_GET['action'] == 'delete_post'){
                $this->deletePostRoute();
            }else{
                http_response_code(404);
                require '404.php';
            }
        }else{
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showHome();
        }
    }

    private function createNewPostRoute(){
        if($_SESSION['admin'] == true){
            if(isset($_POST['record'])){
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_FILES['file_name']['name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                if((!empty($_FILES['file_name']['name'])) && (!empty($_POST['file_description']))){
                    $this->uploadFile();
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->recordPost($title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }else{
                    $file_name = 'cover.png';
                    $file_description = 'Paysage de l\'alaska, montagne avec sapins qui surplombe une rivière, photo de la couverture du livre';
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->recordPost($title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }
            }elseif(isset($_POST['publish'])){
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_FILES['file_name']['name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                if((!empty($_FILES['file_name']['name'])) && (!empty($_POST['file_description']))){
                    $this->uploadFile();
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->publishPost($title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }else{
                    $file_name = 'cover.png';
                    $file_description = 'Paysage de l\'alaska, montagne avec sapins qui surplombe une rivière, photo de la couverture du livre';
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->publishPost($title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }
                
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

    private function updatePostRoute(){
        if($_SESSION['admin'] == true){
            if(isset($_POST['update'])){
                $id = htmlspecialchars($_GET['id']);
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $file_name = htmlspecialchars($_FILES['file_name']['name']);
                $file_description = htmlspecialchars($_POST['file_description']);
                if(!empty($_FILES['file_name']['name'])){
                    $this->uploadFile();
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }else{
                    $file_name = 'cover.png';
                    $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                    $dashboardPostController->updatePost($id, $title, $content, $file_name, $file_description);
                    $this->showDashboardRoute();
                }
            }elseif(isset($_POST['delete'])){
                $id = htmlspecialchars($_GET['id']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->deletePost($id);
                $this->showDashboardRoute();
            }
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

    private function deletePostRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['postId']);
            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
            $dashboardPostController->deletePost($id);
            $this->showDashboardRoute();
        }
    }

    private function showDashboardRoute(){
        $dashboardController = new \p4\blog\controller\DashboardController();
        $dashboardController->showDashboard();
    }

    private function uploadFile(){
        $uploadDir = 'C:\wamp64\www\P4_GOUAULT_EMELINE\public\img\\';
        $fileName = basename($_FILES['file_name']['name']);
        $maxFileSize = 10000000;
        $fileSize = filesize($_FILES['file_name']['tmp_name']);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['file_name']['name'], '.');
        if(!in_array($extension, $extensions)){
            echo '<script> alert(Votre fichier doit être de type png, jpg ou jpeg) </script>;';
        }elseif($fileSize > $maxFileSize){
            echo '<script> alert(Ce fichier est trop volumineux) </script>;';
        }elseif(!isset($error)){
            $fileName = strtr($fileName, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fileName = preg_replace('/([^.a-z0-9]+)/i', '-', $fileName);
            if(move_uploaded_file($_FILES['file_name']['tmp_name'], $uploadDir . $fileName)){
                echo '<script> alert(Succès de l\'upload de l\'image) </script>;';
            }
            else{
                echo '<script> alert(Echec de l\'upload de l\'image) </script>;';
            }
        }
    }
}