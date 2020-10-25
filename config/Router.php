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

                }elseif(($_GET['action'] == 'viewPosts') || ($_GET['action'] == 'viewPost')){
                    $frontRouter = new \p4\blog\config\FrontRouter();
                    $frontRouter->frontRouter($_GET['action']);

                }elseif(($_GET['action'] == 'comment') || ($_GET['action'] == 'comments_awaiting') || ($_GET['action'] == 'publish_comment') || ($_GET['action'] == 'delete_comment_awaiting') || ($_GET['action'] == 'keep_comment') || ($_GET['action'] == 'delete_comment')){
                    $commentsRouter = new \p4\blog\config\CommentsRouter();
                    $commentsRouter->commentsRouter($_GET['action']);

                }elseif(($_GET['action'] == 'report') || ($_GET['action'] == 'show_reports') || ($_GET['action'] == 'show_a_report')){
                    $reportsRouter = new \p4\blog\config\ReportsRouter();
                    $reportsRouter->reportsRouter($_GET['action']);

                }elseif(($_GET['action'] == 'dashboard') || ($_GET['action'] == 'view_post_dashboard') || ($_GET['action'] == 'text_editor') || ($_GET['action'] == 'media') || ($_GET['action'] == 'member_list')){
                    $dashboardRouter = new \p4\blog\config\DashboardRouter();
                    $dashboardRouter->dashboardRouter($_GET['action']);
                    
                }elseif(($_GET['action'] == 'create_new_post') || ($_GET['action'] == 'update_post') || ($_GET['action'] == 'edit_post') || ($_GET['action'] == 'delete_post') || ($_GET['action'] == 'publish_post_awaiting')){
                    $postsRouter = new \p4\blog\config\PostsRouter();
                    $postsRouter->postsRouter($_GET['action']);

                }elseif($_GET['action'] == 'legalNotice'){
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showLegalNotice();
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
        }catch(Exception $e){
            require 'error.php';
        }
    }
}