<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class FrontManager extends DbManager{

    public function getLastPost(){
		$db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr FROM posts WHERE category_id = 1 AND published = 1 ORDER BY date_creation DESC LIMIT 0, 1');
        $post = $req;
		return $post;
	}
}