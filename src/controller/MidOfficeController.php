<?php

namespace p4\blog\controller;
use p4\blog\model\MidOfficeManager as MidOfficeManager;
use p4\blog\model\MemberManager as MemberManager;

class MidOfficeController{

    public function showMemberArea($pseudo){
        $title = 'Espace membre';
        $h1 = 'Mon profil';
        $h2 = 'Mes informations';
        $h3 = 'Mes commentaires';
        $h4 = 'Changer mon pseudo';
        $h5 = 'Changer mon mot de passe';
        $link = 'Retour au blog';
        $link2 = 'Changer de pseudo';
        $link3 = 'Changer de mot de passe';
        $link4 = 'Désinscription';
        $button = 'Fermer';
        $getOneMember = $this->getMember($pseudo);
        $getComments = $this->getComments($pseudo);
        $header = require 'view/midOffice/header.php';
        $content = require 'view/midOffice/home.php';
        require 'view/midOffice/template.php';
    }

    private function getMember($pseudo){
        $memberManager = new MemberManager();
        $getOneMember = $memberManager->getMember($pseudo);
        return $getOneMember;
    }

    private function getComments($pseudo){
        $midOfficeManager = new MidOfficeManager();
        $getComments = $midOfficeManager->getMemberComments($pseudo);
        return $getComments;
    }

    public function updatePseudo($oldPseudo, $newPseudo){
        $midOfficeManager = new MidOfficeManager();
        $updatePseudo = $midOfficeManager->setNewPseudo($oldPseudo, $newPseudo);
        return $updatePseudo;
    }

    public function changePassword($pseudo, $newPassword){
        $midOfficeManager = new MidOfficeManager();
        $changePassword = $midOfficeManager->changePassword($pseudo, $newPassword);
        return $changePassword;
    }
}