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
        $h2 = 'Commentaires en attente de publication';
        $postNumber = 'Lié au billet n°';
        $theAuthor = 'Auteur du commentaire:';
        $theTitle = 'Titre du commentaire:';
        $theComment = 'Commentaire:';
        $theDate = 'Date du commentaire:';
        $publish = 'Publier';
        $delete = 'Supprimer';
        $showCommentsAwaiting = $this->getAllCommentsAwaiting();
        $content = require 'view/backOffice/commentsAwaiting.php';
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
}