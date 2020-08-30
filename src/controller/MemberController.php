<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;

class MemberController{

    public function newMember($pseudo, $mail, $password, $members_category){
        $memberManager = new MemberManager();
        $passwordHache = $_POST['password'];
        $passwordHache = password_hash($password, PASSWORD_DEFAULT);
        $memberManager->setMember($pseudo, $mail, $passwordHache, 2);
    }

    public function getMember($pseudo){
        $memberManager = new MemberManager();
        $getMember = $memberManager->getMember($pseudo);
        return $getMember;
    }

    public function deleteMember($pseudo){
        $memberManager = new MemberManager();
        $disconnectMember = $memberManager->disconnect();
        $deleteMember = $memberManager->deleteMember($pseudo);
        return $deleteMember;
    }

    public function disconnectMember(){
        $memberManager = new MemberManager();
        $disconnectMember = $memberManager->disconnect();
        return $disconnectMember;
    }
}