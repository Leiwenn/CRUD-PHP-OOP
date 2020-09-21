<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class DashboardReportManager extends DbManager{

    public function getReports(){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT reports.id AS rid, posts.title AS title, reports.member_pseudo AS pseudo, DATE_FORMAT(report_date, \'%d/%m/%Y à %Hh%imin%ss\') AS report_date_fr 
            FROM reports 
            LEFT JOIN posts ON reports.post_concerned_id = posts.id 
            LEFT JOIN comments ON reports.comment_id = comments.id'
        );
        $req->execute(array());
        $getReports = $req;
        return $getReports;
    }

    public function getReportedComment($rid){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT * 
            FROM comments 
            LEFT JOIN reports ON comments.id = reports.comment_id 
            WHERE reports.id = ' . $rid
        );
        $req->bindValue(':rid', $rid, \PDO::PARAM_INT);
        $req->execute(array(
            'rid' => $rid
        ));
        $getReport = $req;
        return $getReport;
    }

    public function deleteReport($rid){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM reports 
            WHERE id LIKE ' . "'" . $rid . "'"
        );
        $req->bindValue(':rid', $rid, \PDO::PARAM_INT);
        $req->execute(array($rid));
        return $req;
    }

    public function deletePostReports($post_concerned_id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM reports 
            WHERE post_concerned_id = :post_concerned_id'
        );
        $req->bindValue(':post_concerned_id', $post_concerned_id, \PDO::PARAM_INT);
        $req->execute(array(
            'post_concerned_id' => $post_concerned_id
        ));
        return $req;
    }

    public function deleteMemberReports($comment_author){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM reports 
            WHERE comment_author = :comment_author'
        );
        $req->bindValue(':comment_author', $comment_author, \PDO::PARAM_STR);
        $req->execute(array(
            'comment_author' => $comment_author
        ));
        return $req;
    }

    public function deleteComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM comments 
            WHERE id LIKE :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }

    public function keepComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM reports 
            WHERE id LIKE :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }
}