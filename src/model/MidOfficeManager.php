<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;
class MidOfficeManager extends DbManager{

    public function getMemberComments($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments WHERE published = 1 AND pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        $getMemberComments = $req;
        return $getMemberComments;
    }

    public function setNewPseudo($oldPseudo, $newPseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE members SET pseudo = :newPseudo WHERE pseudo = $oldPseudo');
        $req->execute(array('pseudo' => $newPseudo));
        return $req;
    }

    public function changePassword($pseudo, $newPassword){
        $passwordHache = password_hash($newPassword, PASSWORD_DEFAULT);
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE members SET passwordHache = :passwordHache WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array('passwordHache' => $passwordHache));
        return $req;
    }
}