<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class PostManager extends DbManager{

	public function getPosts(){
		$db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE category_id = 1 AND published = 1 ORDER BY id DESC');
		$posts = $req;
		return $posts;
	}

	public function getPost($postId){
		$db = $this->dbConnexion();
		$req = $db->prepare('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$onePost = $req;
	    return $onePost;
	}
}