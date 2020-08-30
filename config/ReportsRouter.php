<?php

namespace p4\blog\config;
use Exception;

class ReportsRouter{

    public function reportsRouter(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'report'){
                    if(isset($_SESSION['pseudo'])){
                        $commentController = new \p4\blog\controller\CommentController();
                        $comment_id = $_GET['comment_id'];
                        $member_pseudo = $_SESSION['pseudo'];
                        $post_concerned_id = $_GET['post_concerned_id'];
                        $commentController->addReport($comment_id, $member_pseudo, $post_concerned_id);
                        $postController = new \p4\blog\controller\PostController();
                        $_GET['id'] = $_GET['post_concerned_id'];
                        $frontController = new \p4\blog\controller\FrontController();
                        $frontController->showPost();
                    }
                }elseif($_GET['action'] == 'show_reports'){
                    if($_SESSION['admin'] = true){
                        $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                        $dashboardReportController->showReports();
                    }
                }elseif($_GET['action'] == 'show_a_report'){
                    if($_SESSION['admin'] = true){
                        $rid = $_GET['rid'];
                        $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                        $dashboardReportController->showReportedComment($rid);
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