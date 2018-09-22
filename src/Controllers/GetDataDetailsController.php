<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetDataDetailsController extends Controller
{

    public function index(){
        $ResDataId = $this->bag->r('data_id');
        $ResData = Helper::Help('DataDetails',$ResDataId);
        $this->bag->store('DataDetails',$ResDataId,$ResData);
    }

}