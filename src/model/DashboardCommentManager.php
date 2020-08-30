<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class DashboardCommentManager extends DbManager{

    public function getCommentsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE published = 0 ORDER BY comment_date DESC');
        $req->execute(array());
        return $req;
    }

    public function postComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE comments SET published = 1 WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }

    public function deleteCommentAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM comments WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }
}