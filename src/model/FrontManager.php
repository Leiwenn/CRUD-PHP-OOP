<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class FrontManager extends DbManager{

    public function getLastPost(){
		$db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr 
            FROM posts 
            WHERE published = 1 
            ORDER BY date_creation DESC 
            LIMIT 0, 1'
        );
        $req->execute(array());
        $post = $req;
		return $post;
	}
}