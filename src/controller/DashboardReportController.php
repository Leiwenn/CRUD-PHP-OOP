<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardReportManager as DashboardReportManager;

class DashboardReportController{

    private const TITLE = 'Modération';
    private const H1 = 'Dashboard';
    private const HOMEDASHBOARD = 'Accueil Dashboard';
    private const LINKTINY = 'Editeur de texte';
    private const LINKHOME = 'Voir le site';

    public function deleteComment($id){
        $dashboardReportManager = new DashboardReportManager();
        $dashboardReportManager->deleteComment($id);
    }

    public function keepAComment($rid){
        $dashboardReportManager = new DashboardReportManager();
        $id = $rid;
        $dashboardReportManager->keepComment($id);
    }
    
    public function showReports(){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $h2 = 'Demandes de modération';
        $link = 'Voir le commentaire';
        $getAllReports = $this->getTheReports();
        $content = require 'view/backOffice/reports.php';
        require 'view/backOffice/template.php';
    }

    private function getTheReports(){
        $dashboardReportManager = new DashboardReportManager();
        $getTheReports = $dashboardReportManager->getReports();
        return $getTheReports;
    }

    public function showReportedComment($rid){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $h2 = 'Modération';
        $getReportedComment = $this->getTheReportedComment($rid);
        $content = require 'view/backOffice/oneReport.php';
        require 'view/backOffice/template.php';
    }

    private function getTheReportedComment($rid){
        $dashboardReportManager = new DashboardReportManager();
        $getTheReportedComment = $dashboardReportManager->getReportedComment($rid);
        return $getTheReportedComment;
    }

    public function deleteReport($rid){
        $dashboardReportManager = new DashboardReportManager();
        $dashboardReportManager->deleteReport($rid);
    }
}