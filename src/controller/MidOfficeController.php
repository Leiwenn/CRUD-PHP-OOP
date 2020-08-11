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
        $getOneMember = self::getMember($pseudo);
        $getComments = self::getComments($pseudo);
        $header = require 'view/midOffice/header.php';
        $content = require 'view/midOffice/home.php';
        require 'view/midOffice/template.php';
    }
    public function getMember($pseudo){
        $memberManager = new MemberManager();
        $getOneMember = $memberManager->getMember($pseudo);
        return $getOneMember;
    }
    public function getComments($pseudo){
        $midOfficeManager = new MidOfficeManager();
        $getComments = $midOfficeManager->getMemberComments($pseudo);
        return $getComments;
    }

    /**
     * disconnect member
     *
     * @return void
     */
    public function disconnectMember(){
        $midOfficeManager = new MidOfficeManager();
        $disconnectMember = $midOfficeManager->disconnect();
        return $disconnectMember;
    }

    /**
     * disconnect && delete a member
     *
     * @return void
     */
    public function deleteMember($pseudo){
        $midOfficeManager = new MidOfficeManager();
        $disconnectMember = $midOfficeManager->disconnect();
        $DeleteAMember = $midOfficeManager->deleteMember($pseudo);
    }
}