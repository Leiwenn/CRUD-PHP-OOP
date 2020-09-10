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
        $this->deleteAllReports($pseudo);
        $this->deleteAllComments($pseudo);
        $this->deleteAmember($pseudo);
    }

    private function deleteAllReports($pseudo){
        $dashboardReportManager = new DashboardReportManager();
        $deleteReports = $dashboardReportManager->deleteMemberReports($pseudo);
        return $deleteReports;
    }

    private function deleteAllComments($pseudo){
        $dashboardCommentManager = new DashboardCommentManager();
        $deleteComments = $dashboardCommentManager->deleteMemberComments($pseudo);
        return $deleteComments;
    }
    
    private function deleteAmember($pseudo){
        $memberManager = new MemberManager();
        $deleteMember = $memberManager->deleteMember($pseudo);
        return $deleteMember;
    }

    public function disconnectMember(){
        $memberManager = new MemberManager();
        $disconnectMember = $memberManager->disconnect();
        return $disconnectMember;
    }
}