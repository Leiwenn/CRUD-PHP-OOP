<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class MidOfficeManager extends DbManager{

    public function getMemberComments($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments WHERE published = 1 AND pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        $getMemberComments = $req;
        return $getMemberComments;
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