<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;
use p4\blog\model\DashboardManager as DashboardManager;

class PostManager extends DbManager{

	public function getPosts(){
		$db = $this->dbConnexion();
		$req = $db->prepare(
			'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr 
			FROM posts 
			WHERE published = 1 
			ORDER BY id DESC'
		);
		$req->execute(array());
		$posts = $req;
		return $posts;
	}

	public function getPost($id){
		$db = $this->dbConnexion();;
		$req = $db->prepare(
			'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, published
			FROM posts 
			WHERE id = :id'
		);
		$req->bindValue(':id', $id, \PDO::PARAM_STR);
		$req->execute(array('id' => $id));
		$onePost = $req;
	    return $onePost;
	}
}