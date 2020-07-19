<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class MidOfficeManager extends DbManager{

    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT * FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $getMember = $req;
        return $getMember;
    }

    public function getMemberComments($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        $getMemberComments = $req;
        return $getMemberComments;
    }

    public function changePassword($pseudo, $newPassword){
        $passwordHache = password_hash($newPassword, PASSWORD_DEFAULT);
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE members SET passwordHache = passwordHache WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array('passwordHache' => $passwordHache));
        $changePassword = $req;
        return $changePassword;
    }

    /**
     * disconnect member
     *
     * @return void
     */
    public function disconnect(){
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
    }

    /**
     * delete member cookies && DB_data
     *
     * @return void
     */
    public function deleteMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        return $req;
        setcookie('pseudo', '');
        setcookie('password', '');
    }
}