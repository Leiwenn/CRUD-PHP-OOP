<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class DashboardPostManager extends DbManager{

    public function getPostsInDashboard(){
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

    public function getPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT id, title, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr 
            FROM posts 
            WHERE published = 0 
            ORDER BY id DESC'
        );
        $req->execute(array());
        $showPostsAwaiting = $req;
        return $showPostsAwaiting;
    }

    public function getPostAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr 
            FROM posts 
            WHERE published = 0 AND id = :id'
        );
        $req->execute(array(
            'id' => $id
        ));
        $showPostAwaiting = $req;
        return $showPostAwaiting;
    }

    /**
     * controller : recordPost()
     *
     * @param [type] $title
     * @param [type] $content
     * @return void
     */
    public function setPostAwaiting($title, $content){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'INSERT INTO posts(title, content, date_creation, published) 
            VALUES(:title, :content, NOW(), 0)'
        );
        $req->bindValue(':title', $title, \PDO::PARAM_STR);
        $req->bindValue(':content', $content, \PDO::PARAM_STR);
        $req->execute(array(
            'title' => $title, 
            'content' => $content
        ));
        return $req;
    }
    
    /**
     * controller : publishPost()
     *
     * @param [type] $title
     * @param [type] $content
     * @param [type] $file_name
     * @param [type] $file_description
     * @return void
     */
    public function setPost($title, $content, $file_name, $file_description){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'INSERT INTO posts(title, content, file_name, file_description, date_creation, published) 
            VALUES(:title, :content, :file_name, :file_description, NOW(), 1)'
        );
        $req->bindValue(':title', $title, \PDO::PARAM_STR);
        $req->bindValue(':content', $content, \PDO::PARAM_STR);
        $req->bindValue(':file_name', $file_name, \PDO::PARAM_STR);
        $req->bindValue(':file_description', $file_description, \PDO::PARAM_STR);
        $req->execute(array(
            'title' => $title, 
            'content' => $content, 
            'file_name' => $file_name, 
            'file_description' => $file_description
        ));
        return $req;
    }
    public function setPostAwait($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'UPDATE posts 
            SET published = 1 
            WHERE id  LIKE :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }

    public function setUpdatedPost($id, $title, $content, $file_name, $file_description){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'UPDATE posts 
            SET title = :title, content = :content, file_name = :file_name, file_description = :file_description 
            WHERE id LIKE ' . "'" . $id . "'"
        );
        $req->bindValue(':title', $title, \PDO::PARAM_STR);
        $req->bindValue(':content', $content, \PDO::PARAM_STR);
        $req->bindValue(':file_name', $file_name, \PDO::PARAM_STR);
        $req->bindValue(':file_description', $file_description, \PDO::PARAM_STR);
        $req->execute(array(
            'title' => $title, 
            'content' => $content, 
            'file_name' => $file_name, 
            'file_description' => $file_description
        ));
        return $req;
    }

    public function deletePostAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM posts 
            WHERE published = 0 AND id = :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }

    public function deletePost($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM posts 
            WHERE published = 1 AND id = :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }
}