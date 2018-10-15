<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetDashboardController extends Controller
{

    public function index(){
        $id = $this->bag->r('dashboard_id');
        $Data = Helper::Help('GetDashboard',$id);
        $this->bag->store('Dashboard',$id,$Data);
    }

}