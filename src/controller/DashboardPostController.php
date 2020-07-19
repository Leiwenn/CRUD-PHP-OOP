<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardPostManager as DashboardPostManager;
require_once 'src/model/DbManager.php';

class DashboardPostController{

    public function showPostAwaiting(){
        $dashboardPostManager = new DashboardPostManager;
        $showPostsAwaiting = $dashboardPostManager->getPostsAwaiting();
        $h2 = 'Billets en attente de publication';
        $h3 = 'Billet';
        $content = require 'view/backOffice/postAwaiting.php';
        require 'view/backOffice/template.php'; 
    }

}