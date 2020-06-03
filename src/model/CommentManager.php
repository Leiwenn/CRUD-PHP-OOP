<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class CommentManager extends DbManager{

    public function getComments($postId){
        $db = $this->dbConnexion();

        $getComments = $db->prepare('SELECT id, title, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $getComments->execute(array($postId));
    
        return $getComments;
    }
}