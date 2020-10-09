<?php

namespace p4\blog\config;
use Exception;

class CommentsRouter{

    public function commentsRouter(){
        
            if(isset($_GET['action'])){
                if($_GET['action'] == 'comment'){
                    $this->commentRoute();
                }elseif($_GET['action'] == 'comments_awaiting'){
                    $this->commentsAwaitingRoute();
                }elseif($_GET['action'] == 'publish_comment'){
                    $this->publishCommentRoute();
                }elseif($_GET['action'] == 'delete_comment_awaiting'){
                    $this->deleteCommentAwaitingRoute();
                }elseif($_GET['action'] == 'keep_comment'){
                    $this->keepCommentRoute();
                }elseif($_GET['action'] == 'delete_comment'){
                    $this->deleteCommentRoute();
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
    }

    private function commentRoute(){
        if(isset($_SESSION['pseudo'])){
            sleep(1);
            $pseudo = htmlspecialchars($_SESSION['pseudo']);
            $title = htmlspecialchars($_POST['title']);
            $comment = htmlspecialchars($_POST['comment']);
            $postId = htmlspecialchars($_GET['postId']);
            $commentController = new \p4\blog\controller\CommentController();
            $commentController->addComment($pseudo, $title, $comment, $postId);
            $frontController = new \p4\blog\controller\FrontController();
            $frontController->showPost($postId);
        }
    }

    private function commentsAwaitingRoute(){
        if($_SESSION['admin'] == true){
            $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
            $dashboardCommentController->showCommentsAwaiting();
        }
    }

    private function publishCommentRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['id']);
            $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
            $dashboardCommentController->publishComment($id);
            $dashboardCommentController->showCommentsAwaiting();
        }
    }

    private function deleteCommentAwaitingRoute(){
        if($_SESSION['admin'] == true){
            $id = htmlspecialchars($_GET['id']);
            $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
            $dashboardCommentController->deleteCommentAwaiting($id);
            $dashboardCommentController->showCommentsAwaiting();
        }
    }

    private function keepCommentRoute(){
        if($_SESSION['admin'] == true){
            $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
            $rid = htmlspecialchars($_GET['rid']);
            $dashboardCommentController->keepAComment($rid);
            $dashboardReportController = new \p4\blog\controller\DashboardReportController();
            $dashboardReportController->showReports();
        }
    }

    private function deleteCommentRoute(){
        if($_SESSION['admin'] == true){
            $dashboardReportController = new \p4\blog\controller\DashboardReportController();
            $comment_id = htmlspecialchars($_GET['comment_id']);
            $dashboardReportController->deleteCommentReports($comment_id);
            $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
            $id = htmlspecialchars($_GET['comment_id']);
            $dashboardCommentController->deleteComment($id);
            $dashboardReportController->showReports();
        }
    }
}