<?php

namespace p4\blog\controller;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;

class DashboardCommentController{

    public function showCommentsAwaiting(){
        $h1 = 'Dashboard';
        $linkHomeDashboard = 'Accueil Dashboard';
        $linkTiny = 'Editeur de texte';
        $linkComments = 'Commentaires à publier';
        $linkReports = 'Modération';
        $linkHome = 'Voir le site';
        $h2 = 'Commentaires en attente de publication';
        $postNumber = 'Lié au billet n°';
        $theAuthor = 'Auteur du commentaire:';
        $theTitle = 'Titre du commentaire:';
        $theComment = 'Commentaire:';
        $theDate = 'Date du commentaire:';
        $publish = 'Publier';
        $delete = 'Supprimer';
        $dashboardCommentManager = new DashboardCommentManager();
        $showCommentsAwaiting = $dashboardCommentManager->getCommentsAwaiting();
        $content = require 'view/backOffice/commentsAwaiting.php';
        require 'view/backOffice/template.php';
    }

    public function publishComment($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $addComment = $dashboardCommentManager->postComment($id);
        return $addComment;
    }

    public function deleteCommentAwaiting($id){
        $dashboardCommentManager = new DashboardCommentManager();
        $deleteCommentAwait = $dashboardCommentManager->deleteCommentAwaiting($id);
        return $deleteCommentAwait;
    }
}