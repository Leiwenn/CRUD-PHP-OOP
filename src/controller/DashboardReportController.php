<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardReportManager as DashboardReportManager;

class DashboardReportController{

    private const TITLE = 'Modération';
    private const H1 = 'Dashboard';
    private const HOMEDASHBOARD = 'Accueil Dashboard';
    private const LINKTINY = 'Editeur de texte';
    private const LINKHOME = 'Voir le site';
    private const LINKDISCONNECT = '<i class="fas fa-sign-out-alt" title="déconnexion" aria-hidden="true"></i>';


    public function deleteCommentReports($comment_id){
        $dashboardReportManager = new DashboardReportManager();
        $dashboardReportManager->deleteTheCommentReports($comment_id);
    }

    public function showReports(){
        $title = self::TITLE;
        $h1 = self::H1;
        $linkHomeDashboard = self::HOMEDASHBOARD;
        $linkTiny = self::LINKTINY;
        $linkHome = self::LINKHOME;
        $linkDisconnect = self::LINKDISCONNECT;
        $h2 = 'Demandes de modération';
        $link = 'Voir le commentaire';
        $getAllReports = $this->getTheReports();
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
        $linkDisconnect = self::LINKDISCONNECT;
        $h2 = 'Modération';
        $getReportedComment = $this->getTheReportedComment($rid);
        require 'view/backOffice/template.php';
    }

    private function getTheReportedComment($rid){
        $dashboardReportManager = new DashboardReportManager();
        $getTheReportedComment = $dashboardReportManager->getReportedComment($rid);
        return $getTheReportedComment;
    }

}