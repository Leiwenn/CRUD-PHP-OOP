<?php

namespace p4\blog\config;
use Exception;

class ReportsRouter{

    public function reportsRouter(){

            if(isset($_GET['action'])){
                if($_GET['action'] == 'report'){
                        $this->addReportRoute();
                }elseif($_GET['action'] == 'show_reports'){
                    $this->showReportsRoute();
                }elseif($_GET['action'] == 'show_a_report'){
                    $this->showAReportRoute();
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
    }

    private function addReportRoute(){
        if(isset($_SESSION['pseudo'])){
            $commentController = new \p4\blog\controller\CommentController();
            $comment_id = htmlspecialchars($_GET['comment_id']);
            $member_pseudo = htmlspecialchars($_SESSION['pseudo']);
            $post_concerned_id = htmlspecialchars($_GET['post_concerned_id']);
            $commentController->addReport($comment_id, $member_pseudo, $post_concerned_id);
            $postId = htmlspecialchars($_GET['post_concerned_id']);
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showPost($postId);
        }
    }

    private function showReportsRoute(){
        if($_SESSION['admin'] == true){
            $dashboardReportController = new \p4\blog\controller\DashboardReportController();
            $dashboardReportController->showReports();
        }
    }

    private function showAReportRoute(){
        if($_SESSION['admin'] == true){
            $rid = htmlspecialchars($_GET['rid']);
            $dashboardReportController = new \p4\blog\controller\DashboardReportController();
            $dashboardReportController->showReportedComment($rid);
        }
    }
}