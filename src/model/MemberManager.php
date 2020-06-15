<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class MemberManager extends DbManager{

    /**
     * set new member in DB
     *
     * @param [type] $pseudo
     * @param [type] $mail
     * @param [type] $passwordHache
     * @param [type] $members_category
     * @return void
     */
    public function setMember($pseudo, $mail, $passwordHache, $members_category){
        $db = $this->dbConnexion();

        $addMember = $db->prepare('INSERT INTO members(pseudo, mail, passwordHache, registration_date, members_category) VALUES(:pseudo, :mail, :passwordHache, CURDATE(), :members_category)');
        $addMember->execute(array('pseudo' => $pseudo, 'mail' => $mail, 'passwordHache' => $passwordHache, 'members_category' => $members_category));
    }

    /**
     * get all from members
     *
     * @return void
     */
    public function getMembers(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT pseudo, mail, passwordHache, members_category FROM members');
        $getMembers = $req;
        return $getMembers;
    }

    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT pseudo, mail, registration_date FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $getMember = $req;
        return $getMember;
    }

    /**
     * count total of members
     *
     * @return void
     */
    public function countMembers(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_members FROM members WHERE id AND members_category = 2');
        $countMembers = $req;
        return $countMembers;
    }

    /**
     * disconnect member
     *
     * @return void
     */
    public function disconnect(){
        //session_start();
        //$_SESSION['pseudo'] = null;
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
    }

    /**
     * delete member cookies && DB_data
     *
     * @return void
     */
    public function deleteMember(){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM members WHERE id = ?');
        
        setcookie('pseudo', '');
        setcookie('password', '');
    }

}