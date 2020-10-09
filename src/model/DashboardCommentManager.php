<?php

namespace p4\blog\model;
use p4\blog\model\database\DbManager as DbManager;

class DashboardCommentManager extends DbManager{

    public function getCommentsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'SELECT id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id 
            FROM comments 
            WHERE published = 0 
            ORDER BY comment_date DESC'
        );
        $req->execute(array());
        return $req;
    }

    public function postComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'UPDATE comments 
            SET published = 1 
            WHERE id LIKE :id'
        );
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute(array(
            'id' => $id
        ));
        return $req;
    }

    public function deleteCommentAwaiting($id){
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

    public function deletePostComments($id){
        $post_id = $id;
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM comments 
            WHERE post_id LIKE :post_id'
        );
        $req->bindValue(':post_id', $post_id, \PDO::PARAM_INT);
        $req->execute(array(
            'post_id' => $post_id
        ));
        return $req;
    }

    public function deleteMemberComments($pseudo){
        $db = $this->dbConnexion();
        $req = $db->prepare(
            'DELETE FROM comments 
            WHERE pseudo = :pseudo'
        );
        $req->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $req->execute(array(
            'pseudo' => $pseudo
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