<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class DashboardManager extends DbManager{

    /**
     * count total of comments awaiting validation by admin from comments_awaiting
     * controller _ totalCommentsAwaiting()
     *
     * @return void
     */
    public function countCommentsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_comments FROM comments WHERE published = 0 AND id');
        $countCommentsAwaiting = $req;
        return $countCommentsAwaiting;
    }

    /**
     * controller _ totalReports()
     */
    public function countReports(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_reports FROM reports WHERE id');
        $countReports = $req;
        return $countReports;
    }

    /**
     * count total published posts ALASKA
     *
     * @return void
     */
    public function countPosts(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_posts FROM posts WHERE published = 1 AND category_id = 1');
        $countPosts = $req;
        return $countPosts;
    }

    public function countPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT COUNT(*) nbre_posts FROM posts WHERE published = 0 AND id');
        $req->execute(array());
        $countPostsAwaiting = $req;
        return $countPostsAwaiting;
    }

}