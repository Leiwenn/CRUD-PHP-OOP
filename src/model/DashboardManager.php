<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class DashboardManager extends DbManager{

    /**
     * count total of comments awaiting validation by admin from comments_awaiting
     * controller _ totalCommentsAwaiting()
     *
     * @return void
     */
    public function countCommentsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_comments FROM comments_awaiting WHERE id');
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
     * count total of posts ALASKA
     *
     * @return void
     */
    public function countPosts(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_posts FROM posts WHERE id AND category_id = 1');
        $countPosts = $req;
        return $countPosts;
    }

    public function countPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT COUNT(*) nbre_posts FROM posts_awaiting WHERE id');
        $req->execute(array());
        $countPostsAwaiting = $req;
        return $countPostsAwaiting;
    }

}