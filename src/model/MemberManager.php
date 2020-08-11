<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

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

    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT * FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $getMember = $req;
        return $getMember;
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

}