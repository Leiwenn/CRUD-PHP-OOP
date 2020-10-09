<?php

namespace p4\blog\config;
use Exception;

class FrontRouter{

    public function frontRouter(){

            if(isset($_GET['action'])){
                if($_GET['action'] == 'viewPosts'){
                    $this->viewPostsRoute();
                }elseif($_GET['action'] == 'viewPost'){
                    $this->viewPostRoute();
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
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = htmlspecialchars($_GET['page']);
        }else{
            $currentPage = 1;
        }
        $frontController->showPostsWithPagination($currentPage);
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
}