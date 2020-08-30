<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardReportManager as DashboardReportManager;

class DashboardReportController{

    public const TITLE = 'Modération';
    public const H1 = 'Dashboard';
    public const HOMEDASHBOARD = 'Accueil Dashboard';
    public const LINKTINY = 'Editeur de texte';
    public const LINKCOMMENTS = 'Commentaires à publier';
    public const LINKREPORTS = 'Modération';
    public const LINKHOME = 'Voir le site';

    public function deleteComment($id){
        $dashboardReportManager = new DashboardReportManager();
        $deleteAComment = $dashboardReportManager->deleteComment($id);
        return $deleteAComment;
    }

    public function keepAComment($id){
        $dashboardReportManager = new DashboardReportManager();
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
        $dashboardReportManager = new DashboardReportManager();
        $getAllReports = $dashboardReportManager->getReports();
        $content = require 'view/backOffice/reports.php';
        require 'view/backOffice/template.php';
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
        $dashboardReportManager = new DashboardReportManager();
        $getReportedComment = $dashboardReportManager->getReportedComment($rid);
        $content = require 'view/backOffice/oneReport.php';
        require 'view/backOffice/template.php';
    }

    public function deleteReport($rid){
        $dashboardReportManager = new DashboardReportManager();
        $deleteReport = $dashboardReportManager->deleteReport($rid);
        return $deleteReport;
    }
}