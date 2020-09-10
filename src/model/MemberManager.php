<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class MemberManager extends DbManager{

    public function setMember($pseudo, $mail, $passwordHache, $members_category){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'INSERT INTO members(pseudo, mail, passwordHache, registration_date, members_category) 
            VALUES(:pseudo, :mail, :passwordHache, CURDATE(), :members_category)'
        );
        $req->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $req->bindValue(':passwordHache', $passwordHache, \PDO::PARAM_STR);
        $req->bindValue(':members_category', $members_category, \PDO::PARAM_INT);
        $req->execute(array(
            'pseudo' => $pseudo, 
            'mail' => $mail, 
            'passwordHache' => $passwordHache, 
            'members_category' => $members_category
        ));
    }

    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT * 
            FROM members 
            WHERE pseudo LIKE :pseudo 
            LIMIT 1'
        );
        $req->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $req->execute(array(
            'pseudo' => $pseudo
        ));
        $getMember = $req;
        return $getMember;
    }

    public function deleteMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM members 
            WHERE pseudo LIKE :pseudo'
        );
        $req->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $req->execute(array('pseudo' => $pseudo));
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