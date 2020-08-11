<?php

namespace p4\blog\model;
require_once 'src/model/dataBase/DbManager.php';

class DashboardCommentManager extends DbManager{

    /**
     * get all comments awaiting
     * controller _ showCommentsAwaiting()
     *
     * @param [type] $postId
     * @return void
     */
    public function getCommentsAwaiting(){
        $db = $this->dbConnexion();
        $getCommentsAwaiting = $db->prepare('SELECT id, pseudo, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE published = 0 ORDER BY comment_date DESC');
        $getCommentsAwaiting->execute(array());
        return $getCommentsAwaiting;
    }

    /**
     * publish a comment
     * controller _ addComment($pseudo, $title, $comment, $comment_date, $post_id)
     *
     * @param [type] $id
     * @return void
     */
    public function postComment($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE comments SET published = 1 WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }

    

    /**
     * controller _ deleteCommentAwaiting($id)
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCommentAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM comments WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }

}