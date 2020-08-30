<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class MemberManager extends DbManager{

    public function setMember($pseudo, $mail, $passwordHache, $members_category){
        $db = $this->dbConnexion();
        $addMember = $db->prepare('INSERT INTO members(pseudo, mail, passwordHache, registration_date, members_category) VALUES(:pseudo, :mail, :passwordHache, CURDATE(), :members_category)');
        $addMember->execute(array('pseudo' => $pseudo, 'mail' => $mail, 'passwordHache' => $passwordHache, 'members_category' => $members_category));
    }

    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'LIMIT 1");
        $req->execute(array($pseudo));
        $getMember = $req;
        return $getMember;
    }

    public function deleteMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        return $req;
        setcookie('pseudo', '');
        setcookie('password', '');
    }

    public function disconnect(){
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
    }
}