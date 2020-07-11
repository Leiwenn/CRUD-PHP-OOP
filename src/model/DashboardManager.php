<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class DashboardManager extends DbManager{

    // ---- WIDGETS ----
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
    public function countReports(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT COUNT(*) nbre_reports FROM reports WHERE id');
        $countReports = $req;
        return $countReports;
    }
    
    // ---- END WIDGETS ----


    // ---- COMMENTS ----

    /**
     * get all comments awaiting validation by admin from comments_awaiting
     * controller _ getCommentsAwaitingPublication()
     *
     * @param [type] $postId
     * @return void
     */
    public function getCommentsAwaiting(){
        $db = $this->dbConnexion();
        $getCommentsAwaiting = $db->prepare('SELECT id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments_awaiting ORDER BY comment_date DESC');
        $getCommentsAwaiting->execute(array());
        return $getCommentsAwaiting;
    }
    /**
     * publish a comment from comments_awaiting to comments
     *
     * @param [type] $postId
     * @param [type] $pseudo
     * @param [type] $title
     * @param [type] $comment
     * @return void
     */
    public function postComment($pseudo, $title, $comment, $comment_date, $post_id){
        $date = date('d/m/Y H:i:s');
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO comments(pseudo, title, comment, comment_date, post_id) VALUES(?, ?, ?, ?, ?)');
        $addComment = $req->execute(array($pseudo, $title, $comment, $date, $post_id));
    }
    /**
     * 
     *controller _ showComment()
     * @return void
     */
    public function showComment(){
        $db = $this->dbConnexion();
        $getComment = $db->query('SELECT * FROM reports RIGHT JOIN comments ON reports.id = reports.id');
        $comment = $getComment;
        return $comment;
    }
    /**
     * delete a reported comment
     * controller _ deleteAComment()
     * 
     */
    public function deleteComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM comments WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }
    /**
     * keep a reported comment
     * controller _ keepAComment()
     *
     * @param [type] $commentId
     * @return void
     */
    public function keepComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM reports WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }
    // ---- END COMMENTS ----


    // ---- REPORTS ----

    /**
     * get all reports
     * controller _ getAllReports()
     *
     * @return void
     */
    public function getReports(){   // return rid => null
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT reports.id AS rid, posts.title AS title, comments.pseudo AS pseudo FROM reports RIGHT JOIN posts ON reports.postId = posts.id RIGHT JOIN comments ON comments.post_id = posts.id');
        $req->execute(array());
        $getReports = $req;
        return $getReports;
    }
    /**
     * get one report where id
     * controller _ showreport()
     *
     * @param [type] $reportId
     * @return void
     */
    /*public function getReport($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments INNER JOIN reports ON reports.postId = comments.id WHERE reports.id = ?');
        $req->execute(array($id));
        $getReport = $req;
        return $getReport;
    }*/
    public function getReport($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments LEFT JOIN reports ON reports.postId = comments.id');
        $req->execute(array($id));
        $getReport = $req;
        return $getReport;
    }
    

    // ---- POSTS ----

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
    /**
     * get all posts awaiting to publish
     *
     * @return void
     */
    public function getPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%\') AS creation_date_fr FROM posts_awaiting WHERE category_id = 1 ORDER BY date_creation DESC');
        $showPostsAwaiting = $req;
        return $showPostsAwaiting;
    }
}