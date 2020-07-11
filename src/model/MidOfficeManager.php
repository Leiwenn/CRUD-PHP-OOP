<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class MidOfficeManager extends DbManager{

    //DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr
    //'SELECT *, DATE_FORMAT(registration_date, \'%d/%m/%Y à %Hh%\') AS registration_date_fr FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'"
    public function getMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT * FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $getMember = $req;
        return $getMember;
    }
}