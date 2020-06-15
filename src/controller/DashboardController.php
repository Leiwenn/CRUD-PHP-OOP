<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
use p4\blog\model\DashboardManager as DashboardManager;
require_once 'src/model/DbManager.php';

class DashboardController{

    public $totalMembers;

    /**
     * show dashboard with widgets
     *
     * @return void
     */
    public function showDashboard(){
        $totalMembers = self::totalMembers();
        $content = require 'view/backOffice/dashboard.php';
        require 'view/backOffice/template.php';
    }

    /**
     * count total of members
     *
     * @return void
     */
    public function totalMembers(){
        $memberManager = new MemberManager();
        $getTotalMembers = $memberManager->countMembers();
        return $getTotalMembers;
    }

    public function showReports(){
        $totalMembers = self::totalMembers();
        $getAllReports = self::getAllReports();
        $showReports = $getAllReports;
        $showComment = self::showComment();
        $content = require 'view/backOffice/reports.php';
        require 'view/backOffice/template.php';
    }

    public function showComment(){
        $dashboardManager = new DashboardManager();
        $showComment = $dashboardManager->showComment();
        return $showComment;
    }

    public function getAllReports(){
        $dashboardManager = new DashboardManager();
        $getAllReports = $dashboardManager->getReport();
        return $getAllReports;
    }

    public function showEditor(){
        $content = require 'view/backOffice/editor.php';
        require 'view/backOffice/template.php';
    }    
}