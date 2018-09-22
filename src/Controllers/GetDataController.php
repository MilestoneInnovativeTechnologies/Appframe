<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetDataController extends Controller
{

    public function index(){
        $ResDataId = $this->bag->r('data_id'); $RecId = $this->bag->r('record_id');
        $Data = Helper::Help('GetData',$ResDataId,[ 'record_id' => $RecId ]);
        $this->bag->store('Data',$ResDataId,$Data);
    }

}