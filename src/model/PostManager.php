<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class PostManager extends DbManager{

	public function getPosts(){
		$db = $this->dbConnexion();
		$req = $db->prepare(
			'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr 
			FROM posts 
			WHERE published = 1 
			ORDER BY id DESC 
			LIMIT 0, 4'
		);
		$req->execute(array());
		$posts = $req;
		return $posts;
	}

	public function getPost($postId){
		$db = $this->dbConnexion();
		$postId = htmlspecialchars($postId);
		$req = $db->prepare(
			'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr 
			FROM posts 
			WHERE id = :id'
		);
		$req->bindValue(':postId', $postId, \PDO::PARAM_STR);
		$req->execute(array('id' => $postId));
		$onePost = $req;
	    return $onePost;
	}
}