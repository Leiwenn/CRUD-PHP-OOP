<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardReportManager as DashboardReportManager;
use p4\blog\model\MidOfficeManager as MidOfficeManager;
require_once 'src/model/DbManager.php';

class DashboardReportController{

    /**
     * delete a reported comment
     * 
     */
    public function deleteComment($id){
        $dashboardReportManager = new DashboardReportManager();
        $deleteAComment = $dashboardReportManager->deleteComment($id);
        return $deleteAComment;
    }

    /**
     * REPORTS  keep a reported comment
     * manager _ keepComment($commentId)
     */
    public function keepAComment($id){
        $dashboardReportManager = new DashboardReportManager();
        $keepAComment = $dashboardReportManager->keepComment($id);
        return $keepAComment;
    }
    
    public function showReports(){
        $h1 = 'Dashboard';
        $h2 = 'Modération';
        $h3 = 'Demandes des membres:';
        $dashboardReportManager = new DashboardReportManager();
        $getAllReports = $dashboardReportManager->getReports();
        $content = require 'view/backOffice/reports.php';
        require 'view/backOffice/template.php';
    }

    public function showReportedComment($rid){
        $h1 = 'Dashboard';
        $h2 = 'Modération';
        $h3 = 'Modérer ce commentaire:';
        $dashboardReportManager = new DashboardReportManager();
        $getReportedComment = $dashboardReportManager->getReportedComment($rid);
        $content = require 'view/backOffice/oneReport.php';
        require 'view/backOffice/template.php';
    }

    public function deleteMember($pseudo){
        $dashboardReportManager = new DashboardReportManager();
        $deleteMember = $dashboardReportManager->deleteMember($pseudo);
        
        return $deleteMember;
    }

    public function deleteReport($rid){
        $dashboardReportManager = new DashboardReportManager();
        $deleteReport = $dashboardReportManager->deleteReport($rid);
        return $deleteReport;
    }
}