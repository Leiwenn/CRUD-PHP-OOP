<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class DashboardReportManager extends DbManager{

    /**
     * get all reports
     * controller _ in showReports()
     *
     * @return void
     */
    public function getReports(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT reports.id AS rid, posts.title AS title, reports.member_pseudo AS pseudo, DATE_FORMAT(report_date, \'%d/%m/%Y à %Hh%imin%ss\') AS report_date_fr FROM reports LEFT JOIN posts ON reports.post_concerned_id = posts.id LEFT JOIN comments ON reports.comment_id = comments.id');
        $req->execute(array());
        $getReports = $req;
        return $getReports;
    }

    /**
     * get one comment reported where id
     * controller _ showReportedComment($rid)
     *
     * @param [type] $reportId
     * @return void
     */
    public function getReportedComment($rid){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM comments LEFT JOIN reports ON comments.id = reports.comment_id WHERE reports.id = ' . $rid);
        $req->execute(array($rid));
        $getReport = $req;
        return $getReport;
        var_dump($getReport);
        die;
    }

    public function deleteReport($rid){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM reports WHERE id = ?');
        $req->execute(array($rid));
        return $req;
    }

    /**
     * delete a comment
     * controller _ deleteComment($id)
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
     * controller _ keepAComment($id)
     *
     * @param [type] $commentId
     * @return void
     */
    public function keepComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM reports WHERE id = ?');
        $req->execute(array($id));
        return $req;
    }

    /**
     * delete member cookies && DB_data
     *
     * @return void
     */
    public function deleteMember($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM members WHERE pseudo LIKE ' . "'" . $pseudo . "'");
        $req->execute(array($pseudo));
        return $req;
    }
}