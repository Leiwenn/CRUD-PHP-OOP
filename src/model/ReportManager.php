<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class ReportManager extends DbManager{

    public function setReport($comment_id, $member_pseudo, $post_concerned_id, $comment_author){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'INSERT INTO reports(comment_id, comment_author, member_pseudo, post_concerned_id, report_date) 
            VALUES(:comment_id, :comment_author, :member_pseudo, :post_concerned_id, NOW())'
        );
        $req->bindValue(':comment_id', $comment_id, \PDO::PARAM_INT);
        $req->bindValue(':comment_author', $comment_author, \PDO::PARAM_INT);
        $req->bindValue(':member_pseudo', $member_pseudo, \PDO::PARAM_STR);
        $req->bindValue(':post_concerned_id', $post_concerned_id, \PDO::PARAM_INT);
        $req->execute(array(
            'comment_id' => $comment_id, 
            'comment_author' => $comment_author,
            'member_pseudo' => $member_pseudo, 
            'post_concerned_id' => $post_concerned_id
        ));
        return $req;
    }
}