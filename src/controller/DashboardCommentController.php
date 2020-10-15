<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;

class DashboardCommentController{

    public function showCommentsAwaiting(){
        $title = 'Commentaires';
        $h1 = 'Dashboard';
        $linkHomeDashboard = 'Accueil Dashboard';
        $linkTiny = 'Editeur de texte';
        $linkHome = 'Voir le site';
        $linkDisconnect = '<i class="fas fa-sign-out-alt" title="déconnexion"></i>';
        $h2 = 'Commentaires en attente de publication';
        $postNumber = 'Lié au billet n°';
        $theAuthor = 'Auteur : ';
        $theTitle = 'Titre : ';
        $theComment = 'Commentaire:';
        $theDate = 'Le : ';
        $publish = 'Publier';
        $delete = 'Supprimer';
        $showCommentsAwaiting = $this->getAllCommentsAwaiting();
        require 'view/backOffice/template.php';
    }

    private function getAllCommentsAwaiting(){
        $dashboardCommentManager = new DashboardCommentManager();
        $getAllCommentsAwaiting = $dashboardCommentManager->getCommentsAwaiting();
        return $getAllCommentsAwaiting;
    }

    public function publishComment($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->postComment($id);
    }

    public function deleteCommentAwaiting($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->deleteCommentAwaiting($id);
    }

    public function deleteComment($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->deleteComment($id);
    }
    public function keepAComment($rid){
        $dashboardCommentManager = new DashboardCommentManager();
        $id = $rid;
        $dashboardCommentManager->keepComment($id);
    }
}