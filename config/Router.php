<?php

namespace p4\blog\config;
use Exception;

class Router{

    public function router(){
        try{
            if(isset($_GET['action'])){
                if(($_GET['action'] == 'registration') || ($_GET['action'] == 'login') || ($_GET['action'] == 'member_area') || ($_GET['action'] == 'change_pseudo') || ($_GET['action'] == 'change_password') || ($_GET['action'] == 'disconnect') || ($_GET['action'] == 'unregistration') || ($_GET['action'] == 'exclude_member')){
                    $memberRouter = new \p4\blog\config\MemberRouter();
                    $memberRouter->memberRouter($_GET['action']);

                }elseif(($_GET['action'] == 'viewPosts') || ($_GET['action'] == 'viewPost') || ($_GET['action'] == 'create_new_post') || ($_GET['action'] == 'edit_Post_Awaiting') || ($_GET['action'] == 'update_post_awaiting') || ($_GET['action'] == 'edit_Post') || ($_GET['action'] == 'change_post') || ($_GET['action'] == 'delete_Post') || ($_GET['action'] == 'publish_Post_Awaiting') || ($_GET['action'] == 'delete_Post_Awaiting')){
                    $postsRouter = new \p4\blog\config\PostsRouter();
                    $postsRouter->postsRouter($_GET['action']);

                }elseif(($_GET['action'] == 'comment') || ($_GET['action'] == 'comments_awaiting') || ($_GET['action'] == 'publish_comment') || ($_GET['action'] == 'delete_comment_awaiting') || ($_GET['action'] == 'keep_comment') || ($_GET['action'] == 'delete_comment')){
                    $commentsRouter = new \p4\blog\config\CommentsRouter();
                    $commentsRouter->commentsRouter($_GET['action']);

                }elseif(($_GET['action'] == 'dashboard') || ($_GET['action'] == 'view_Post_Awaiting') || ($_GET['action'] == 'view_Post_Dashboard')  ||  ($_GET['action'] == 'text_editor')){
                    $dashboardRouter = new \p4\blog\config\DashboardRouter();
                    $dashboardRouter->dashboardRouter($_GET['action']);
                    
                }elseif(($_GET['action'] == 'report') || ($_GET['action'] == 'show_reports') || ($_GET['action'] == 'show_a_report')){
                    $reportsRouter = new \p4\blog\config\ReportsRouter();
                    $reportsRouter->reportsRouter($_GET['action']);

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