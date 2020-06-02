<?php

//namespace Blog\models;

require_once 'model/DbManager.php';

class PostManager extends DbManager{

    //récupère tous les billets
	public function getPosts(){

		$db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE category_id = 1 ORDER BY date_creation DESC LIMIT 0, 5');
        $posts = $req;

		return $posts;
	}

	//récupère un billet en fonction de son ID
	public function getPost($postId){
		$db = $this->dbConnexion();

		$req = $db->prepare('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
	    $onePost = $req;
		
	    return $onePost;
	}

}