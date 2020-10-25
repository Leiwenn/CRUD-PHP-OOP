<?php

namespace p4\blog\config;
use Exception;

class DashboardRouter{

    public function dashboardRouter(){

            if(isset($_GET['action'])){
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
                    if($_GET['action'] == 'dashboard'){
                        $this->dashboardRoute();
                    }elseif($_GET['action'] == 'view_post_dashboard'){
                        $this->viewPostDashboardRoute();
                    }elseif($_GET['action'] == 'text_editor'){
                        $this->textEditorRoute();
                    }elseif($_GET['action'] == 'media'){
                        $this->mediaRoute();
                    }elseif($_GET['action'] == 'member_list'){
                        $this->memberListRoute();
                    }else{
                        http_response_code(404);
                        require '404.php';
                    }
                }else{
                    http_response_code(403);
                    require '403.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
    }

    private function dashboardRoute(){
        $dashboardController = new \p4\blog\controller\DashboardController();
        $dashboardController->showDashboard();
    }

    private function viewPostDashboardRoute(){
        if($_SESSION['admin'] == true){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $id = htmlspecialchars($_GET['id']);
                $dashboardPostController = new \p4\blog\controller\DashboardPostController();
                $dashboardPostController->showPostDashboard($id);
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }

    private function textEditorRoute(){
        if($_SESSION['admin'] == true){
            $tinyController = new \p4\blog\controller\TinyController();
            $tinyController->showEditor();
        }
    }

    private function mediaRoute(){
        if($_SESSION['admin'] == true){
            $dashboardMediaController = new \p4\blog\controller\DashboardMediaController();
            $dashboardMediaController->showAllMedia();
        }
    }

    private function memberListRoute(){
        if($_SESSION['admin'] == true){
            $dashboardController = new \p4\blog\controller\DashboardController();
            $dashboardController->showMemberList();
        }
    }
}