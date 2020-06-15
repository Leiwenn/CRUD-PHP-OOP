<?php

namespace p4\blog\controller;
require_once 'src/model/DbManager.php';

class FrontController{

    public function showHome(){
        if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
            $header = require 'view/frontOffice/header.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
            $header = require 'view/frontOffice/headerAdmin.php';
        }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
            $header = require 'view/frontOffice/headerConnect.php';
        }
        $content = require 'view/frontOffice/home.php';
        require 'view/frontOffice/template.php';
    }
}