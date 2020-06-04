<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class MemberManager extends DbManager{

    public function setMember($pseudo, $mail, $passwordHache, $members_category){
        $db = $this->dbConnexion();

        $addMember = $db->prepare('INSERT INTO members(pseudo, mail, passwordHache, registration_date, members_category) VALUES(:pseudo, :mail, :passwordHache, CURDATE(), :members_category)');
        $addMember->execute(array('pseudo' => $pseudo, 'mail' => $mail, 'passwordHache' => $passwordHache, 'members_category' => $members_category));
    }

    public function getMembers(){
        $db = $this->dbConnexion();
        
        $req = $db->query('SELECT pseudo, mail, passwordHache, members_category FROM members');
        $getMembers = $req;
        return $getMembers;
    }
}