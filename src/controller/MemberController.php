<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;

class MemberController{

    /**
     * new member in DB
     *
     * @param [type] $pseudo
     * @param [type] $mail
     * @param [type] $password
     * @param [type] $members_category
     * @return void
     */
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
    
    public function updatePseudo($oldPseudo, $newPseudo){
        $memberManager = new MemberManager();
        $updatePseudo = $memberManager->setNewPseudo($oldPseudo, $newPseudo);
        return $updatePseudo;
    }

    public function changePassword($pseudo, $newPassword){
        $memberManager = new MemberManager();
        $changePassword = $memberManager->changePassword($pseudo, $newPassword);
        return $changePassword;
    }

}