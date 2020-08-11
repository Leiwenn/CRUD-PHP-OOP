<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class DashboardPostManager extends DbManager{

    /**
     * get all posts awaiting to publish
     * controller _ showPostsAwaiting()
     *
     * @return void
     */
    public function getPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, title, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE category_id = 1 AND published = 0 ORDER BY id DESC');
        $req->execute(array());
        $showPostsAwaiting = $req;
        return $showPostsAwaiting;
    }

    public function getPostAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE published = 0 AND id = ?');
        $req->execute(array($id));
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
        $req = $db->prepare('INSERT INTO posts(title, content, date_creation, category_id, published) VALUES(?, ?, NOW(), 1, 0)');
        $req->execute(array($title, $content));
        $setPostAwaiting = $req;
        return $setPostAwaiting;
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
        $req = $db->prepare('INSERT INTO posts(title, content, file_name, file_description, date_creation, category_id, published) VALUES(?, ?, ?, ?, NOW(), 1, 1)');
        $req->execute(array($title, $content, $file_name, $file_description));
        return $req;
    }
    public function setPostAwait($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE posts SET published = 1 WHERE id  LIKE ' . "'" . $id . "'");
        $req->execute(array());
        return $req;
    }

    public function setUpdatedPost($id, $title, $content, $file_name, $file_description){
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE posts SET title = :title, content = :content, file_name = :file_name, file_description = :file_description WHERE id  LIKE ' . "'" . $id . "'");
        $req->execute(array('title' => $title, 'content' => $content, 'file_name' => $file_name, 'file_description' => $file_description));
        return $req;
    }

    public function deletePostAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM posts WHERE published = 0 AND id = ?');
        $req->execute(array($id));
        return $req;
    }

    public function deletePost($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM posts WHERE published = 1 AND id = ?');
        $req->execute(array($id));
        return $req;
    }
}