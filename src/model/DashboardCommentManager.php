<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class DashboardCommentManager extends DbManager{

    /**
     * get all comments awaiting validation by admin from comments_awaiting
     * controller _ showCommentsAwaiting()
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
     * INSERT a comment from comments_awaiting to comments
     * controller _ addComment($pseudo, $title, $comment, $comment_date, $post_id)
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
     * delete a comment from comments_awaiting, use with keepComment($id)
     * controller _ deleteCommentAwaiting($id)
     */
    public function deleteCommentAwaiting($id){
        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM comments_awaiting WHERE id LIKE ' . "'" . $id . "'");
        $req->execute(array($id));
        return $req;
    }

}