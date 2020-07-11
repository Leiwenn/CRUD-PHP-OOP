<?php

namespace p4\blog\controller;
use p4\blog\model\MidOfficeManager as MidOfficeManager;
require_once 'src/model/DbManager.php';

class MidOfficeController{

    public function showMemberArea(){
        $midOfficeManager = new MidOfficeManager();
        $showOneMember = self::getOneMember();
        require 'view/midOffice/template.php';
    }

    public function getOneMember(){
        $midOfficeManager = new MidOfficeManager();
        $getOneMember = $midOfficeManager->getMember($_SESSION['pseudo']);
        return $getOneMember;
    }
}