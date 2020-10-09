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
        $midOfficeManager->setNewPseudo($oldPseudo, $newPseudo);
        $_SESSION['pseudo'] = $newPseudo;
        $this->updatePseudoInComments($oldPseudo, $newPseudo);
        $this->updatePseudoInReports($oldPseudo, $newPseudo);
    }

    private function updatePseudoInComments($oldPseudo, $newPseudo){
        $midOfficeManager = new MidOfficeManager();
        $midOfficeManager->setNewPseudoInComments($oldPseudo, $newPseudo);
    }

    private function updatePseudoInReports($oldPseudo, $newPseudo){
        $midOfficeManager = new MidOfficeManager();
        $midOfficeManager->setNewPseudoInReports($oldPseudo, $newPseudo);
    }

    public function changePassword($pseudo, $newPassword){
        $midOfficeManager = new MidOfficeManager();
        $midOfficeManager->changePassword($pseudo, $newPassword);
    }
}