<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class DashboardManager extends DbManager{

    public function getReport(){
        $db = $this->dbConnexion();
        $getReport = $db->query('SELECT * FROM reports RIGHT JOIN posts ON reports.id = reports.id');
        $reports = $getReport;
        return $reports;
    }

    public function showComment(){
        $db = $this->dbConnexion();
        $getComment = $db->query('SELECT * FROM reports RIGHT JOIN comments ON reports.id = reports.id');
        $comment = $getComment;
        return $comment;
    }
}