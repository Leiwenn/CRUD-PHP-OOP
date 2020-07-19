<?php

namespace p4\blog\model;
require_once 'src/model/DbManager.php';

class DashboardPostManager extends DbManager{

    /**
     * get all posts awaiting to publish
     * controller _ showPostsAwaiting()
     *
     * @return void
     */
    public function getPostsAwaiting(){
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, title, content, file_name, file_description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts_awaiting WHERE category_id = 1 ORDER BY id DESC');
        $req->execute(array());
        $showPostsAwaiting = $req;
        return $showPostsAwaiting;
    }

    
}