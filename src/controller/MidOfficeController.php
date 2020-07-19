<?php

namespace p4\blog\controller;
use p4\blog\model\MidOfficeManager as MidOfficeManager;
require_once 'src/model/DbManager.php';

class MidOfficeController{

    public function showMemberArea(){
        $h2 = 'Mes informations';
        $h3 = 'Mes commentaires';
        $midOfficeManager = new MidOfficeManager();
        $getOneMember = $midOfficeManager->getMember($_SESSION['pseudo']);
        $getComments = $midOfficeManager->getMemberComments($_SESSION['pseudo']);
        $header = require 'view/midOffice/header.php';
        $content = require 'view/midOffice/home.php';
        require 'view/midOffice/template.php';
    }

    public function changePassword($pseudo, $newPassword){
        $midOfficeManager = new MidOfficeManager();
        $changePassword = $midOfficeManager->changePassword($pseudo, $newPassword);
        $midOfficeManager->disconnect();
    }

    /**
     * disconnect member
     *
     * @return void
     */
    public function disconnectMember(){
        $midOfficeManager = new MidOfficeManager();
        $disconnectMember = $midOfficeManager->disconnect();
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