<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class PostManager extends DbManager{

    /**
	 * POSTS get all posts where category is 1 = 'billet simple pour l'alaska'
	 * controller _ showPosts()
	 *
	 * @return void
	 */
	public function getPosts(){
		$db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE category_id = 1 AND published = 1 ORDER BY id DESC');
        $posts = $req;
		return $posts;
	}

	/**
	 * POSTS get one post where ID
	 * controller _ showPost()
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