<?php

namespace p4\blog\controller;
use p4\blog\model\ReportManager as ReportManager;

class ReportController{

    public function addReport($comment_id, $member_pseudo, $post_concerned_id, $comment_author){
        $reportManager = new ReportManager();
        $reportManager->setReport($comment_id, $member_pseudo, $post_concerned_id, $comment_author);
    }
}