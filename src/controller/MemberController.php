<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
use p4\blog\model\DashboardCommentManager as DashboardCommentManager;
use p4\blog\model\DashboardReportManager as DashboardReportManager;

class MemberController{

    public function newMember($pseudo, $mail, $password){
        $memberManager = new MemberManager();
        $passwordHache = $password;
        $passwordHache = password_hash($password, PASSWORD_DEFAULT);
        $memberManager->setMember($pseudo, $mail, $passwordHache, 2);
    }

    public function getMember($pseudo){
        $memberManager = new MemberManager();
        $getMember = $memberManager->getMember($pseudo);
        return $getMember;
    }

    public function deleteMember($pseudo){
        $this->deleteAllReportsFromMember($pseudo);
        $this->deleteAllCommentsFromMember($pseudo);
        $this->deleteThemember($pseudo);
    }

    private function deleteAllReportsFromMember($pseudo){
        $comment_author = $pseudo;
        $dashboardReportManager = new DashboardReportManager();
        $dashboardReportManager->deleteMemberReports($comment_author);
    }

    private function deleteAllCommentsFromMember($pseudo){
        $dashboardCommentManager = new DashboardCommentManager();
        $dashboardCommentManager->deleteMemberComments($pseudo);
    }
    
    private function deleteThemember($pseudo){
        $memberManager = new MemberManager();
        $memberManager->deleteMember($pseudo);
    }

    public function disconnectMember(){
        $memberManager = new MemberManager();
        $memberManager->disconnect();
    }
}