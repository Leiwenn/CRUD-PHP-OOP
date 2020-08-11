<?php

namespace p4\blog\controller;
use p4\blog\model\FrontManager as FrontManager;

class FrontController{

    public function showHome(){
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $header = require 'view/frontOffice/header.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $header = require 'view/frontOffice/headerAdmin.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $showLastPost = self::showLastPost();
        $content = require 'view/frontOffice/home.php';
        require 'view/frontOffice/template.php';
    }

    public function showLastPost(){
        $frontManager = new FrontManager();
        $showLastPost = $frontManager->getLastPost();
        return $showLastPost;
    }
}