<?php

namespace p4\blog\config;
use Exception;

class CommentsRouter{

    public function commentsRouter(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'comment'){
                    if(isset($_SESSION['pseudo'])){
                        $pseudo = $_SESSION['pseudo'];
                        $title = $_POST['title'];
                        $comment = $_POST['comment'];
                        $postId = $_GET['postId'];
                        $commentController = new \p4\blog\controller\CommentController();
                        $commentController->addComment($pseudo, $title, $comment, $postId);
                        $_GET['id'] = $postId;
                        $frontController = new \p4\blog\controller\FrontController();
                        $frontController->showPost();
                    }
                }elseif($_GET['action'] == 'comments_awaiting'){
                    if($_SESSION['admin'] = true){
                        $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                        $dashboardCommentController->showCommentsAwaiting();
                    }
                }elseif($_GET['action'] == 'publish_comment'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['id'];
                        $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                        $dashboardCommentController->publishComment($id);
                        $dashboardCommentController->showCommentsAwaiting();
                    }
                }elseif($_GET['action'] == 'delete_comment_awaiting'){
                    if($_SESSION['admin'] = true){
                        $id = $_GET['id'];
                        $dashboardCommentController = new \p4\blog\controller\DashboardCommentController();
                        $dashboardCommentController->deleteCommentAwaiting($id);
                        $dashboardCommentController->showCommentsAwaiting();
                    }
                }elseif($_GET['action'] == 'keep_comment'){
                    if($_SESSION['admin'] = true){
                        $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                        $id = $_GET['comment_id'];
                        $dashboardReportController->keepAComment($id);
                        $dashboardReportController->showReports();
                    }
                }elseif($_GET['action'] == 'delete_comment'){
                    if($_SESSION['admin'] = true){
                        $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                        $rid = $_GET['rid'];
                        $dashboardReportController->deleteReport($rid);
                        $id = $_GET['comment_id'];
                        $dashboardReportController->deleteComment($id);
                        $dashboardReportController->showReports();
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