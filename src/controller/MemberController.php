<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
require_once 'src/model/DbManager.php';

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

    /**
     * get all from members
     *
     * @return void
     */
    public function getAllMembers(){
        $memberManager = new MemberManager();
        $getAllMembers = $memberManager->getMembers();
        return $getAllMembers;
    }

    /**
     * disconnect member
     *
     * @return void
     */
    public function disconnectMember(){
        $memberManager = new MemberManager();
        $disconnectMember = $memberManager->disconnect();
    }

    /**
     * disconnect && delete a member
     *
     * @return void
     */
    public function DeleteAMember(){
        $memberManager = new MemberManager();
        $disconnectMember = $memberManager->disconnect();
        $DeleteAMember = $memberManager->deleteMember();
    }

}