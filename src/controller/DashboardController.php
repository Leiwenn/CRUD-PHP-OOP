<?php

namespace p4\blog\controller;
use p4\blog\model\MemberManager as MemberManager;
require_once 'src/model/DbManager.php';

class DashboardController{

    public $totalMembers;

    /**
     * count total of members
     *
     * @return void
     */
    public function totalMembers(){
        $memberManager = new MemberManager();
        $getTotalMembers = $memberManager->countMembers();
        return $getTotalMembers;
    }

    public function showDashboard(){
        $totalMembers = self::totalMembers();
        require 'view/backOffice/dashboard.php';
    }
}