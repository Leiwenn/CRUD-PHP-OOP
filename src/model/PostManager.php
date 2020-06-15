<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class PostManager extends DbManager{

    /**
	 * get all posts where category is 1 = 'billet simple pour l'alaska'
	 *
	 * @return void
	 */
	public function getPosts(){
		//imin%ss
		$db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr FROM posts WHERE category_id = 1 ORDER BY date_creation DESC LIMIT 0, 5');
        $posts = $req;

		return $posts;
	}

	/**
	 * get one post where ID
	 *
	 * @param [type] $postId
	 * @return void
	 */
	public function getPost($postId){
		$db = $this->dbConnexion();

		$req = $db->prepare('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
	    $onePost = $req;
		
	    return $onePost;
	}

}