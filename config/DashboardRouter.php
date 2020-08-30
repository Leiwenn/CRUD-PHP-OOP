<?php

namespace p4\blog\config;
use Exception;

class DashboardRouter{

    public function dashboardRouter(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'dashboard'){
                    if($_SESSION['admin'] = true){
                        $dashboardController = new \p4\blog\controller\DashboardController();
                        $dashboardController->showDashboard();
                    }
                }elseif($_GET['action'] == 'view_Post_Dashboard'){
                    if($_SESSION['admin'] = true){
                        if (isset($_GET['id']) && $_GET['id'] > 0){
                            $postId = $_GET['id'];
                            $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                            $dashboardPostController->showPostDashboard($postId);
                        }else{
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                    }
                }elseif($_GET['action'] == 'view_Post_Awaiting'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['id'];
                        $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                        $dashboardPostController->showPostAwaiting($id);
                    }
                }elseif($_GET['action'] == 'text_editor'){
                    if($_SESSION['admin'] = true){
                        $tinyController = new \p4\blog\controller\TinyController();
                        $tinyController->showEditor();
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