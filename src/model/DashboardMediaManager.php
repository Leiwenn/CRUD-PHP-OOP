<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class DashboardMediaManager extends DbManager{

    public function getAllMedia(){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT file_name, file_description 
            FROM posts 
            ORDER BY id'
        );
        $req->execute(array());
        return $req;
    }
}