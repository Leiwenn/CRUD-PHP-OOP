<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardMediaManager as DashboardMediaManager;

class DashboardMediaController{

    public function showAllMedia(){
        $title = 'Images';
        $h1 = 'Mes images';
        $linkHomeDashboard = 'Accueil Dashboard';
        $linkTiny = 'Editeur de texte';
        $linkMedia = 'Images';
        $linkHome = 'Voir le site';
        $linkDisconnect = '<i class="fas fa-sign-out-alt" title="déconnexion"></i>';
        $h2 = 'Liste';
        $allMedia = $this->getAllTheMedia();
        require 'view/backOffice/template.php';
    }

    private function getAllTheMedia(){
        $dashboardMediaManager = new DashboardMediaManager();
        $allTheMedia = $dashboardMediaManager->getAllMedia();
        return $allTheMedia;
    }
}