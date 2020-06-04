<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
require_once 'src/model/DbManager.php';

class MemberController{

    public function newMember($pseudo, $mail, $password, $members_category){
        $memberManager = new MemberManager();
        $passwordHache = $_POST['password'];
        $passwordHache = password_hash($password, PASSWORD_DEFAULT);
        $memberManager->setMember($pseudo, $mail, $passwordHache, $members_category);
        $header = require 'view/frontOffice/header.php';
    }

    public function getAllMembers(){
        $memberManager = new MemberManager();
        $getAllMembers = $memberManager->getMembers();
        return $getAllMembers;
    }
}