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

    public function countNbrPages(){
        $nbrPosts = $this->countNbrPosts();
        $postsPerPage = 6;
        $nbrPages = ceil($nbrPosts / $postsPerPage);
        return $nbrPages;
    }
    private function countNbrPosts(){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT COUNT(*) nbre_posts 
            FROM posts 
            WHERE published = 1'
        );
        $req->execute();
        $countPosts = $req->fetch();
        $nberPosts = (int) $countPosts['nbre_posts'];
        return $nberPosts;
    }
    
    public function getPostsWithPagination($currentPage){
        $db = $this->dbConnexion();
        $postsPerPage = 6;
        $firstPost = intval(($currentPage * $postsPerPage) - $postsPerPage);
        $req = $db->prepare(
            'SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr 
            FROM posts 
            WHERE published = 1 
            ORDER BY date_creation DESC 
            LIMIT ' . $firstPost . ','. $postsPerPage
        );
        $req->bindValue(':firstPost', $firstPost, \PDO::PARAM_INT);
        $req->bindValue(':postsPerPage', $postsPerPage, \PDO::PARAM_INT);
        $req->execute(array());
        $postsWithPagination = $req;
        return $postsWithPagination;
    }
}