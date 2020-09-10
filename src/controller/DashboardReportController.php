<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardReportManager as DashboardReportManager;

class DashboardReportController{

    private const TITLE = 'Modération';
    private const H1 = 'Dashboard';
    private const HOMEDASHBOARD = 'Accueil Dashboard';
    private const LINKTINY = 'Editeur de texte';
    private const LINKCOMMENTS = 'Commentaires à publier';
    private const LINKREPORTS = 'Modération';
    private const LINKHOME = 'Voir le site';

    public function deleteComment($id){
        $dashboardReportManager = new DashboardReportManager();
        $deleteAComment = $dashboardReportManager->deleteComment($id);
        return $deleteAComment;
    }

    public function keepAComment($rid){
        $dashboardReportManager = new DashboardReportManager();
        $id = $rid;
        $keepAComment = $dashboardReportManager->keepComment($id);
        return $keepAComment;
    }
    
    public function showReports(){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkComments = self::LINKCOMMENTS;
        $linkReports = self::LINKREPORTS;
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
        $linkComments = self::LINKCOMMENTS;
        $linkReports = self::LINKREPORTS;
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
        $deleteReport = $dashboardReportManager->deleteReport($rid);
        return $deleteReport;
    }
}