<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFormDataController extends Controller
{

    public function index(){
        $DataId = $this->bag->r('data_id'); $record_id = $this->bag->r('record');
        $last_updated = $this->bag->req('last_updated') ?: 0;
        $Data = Helper::Help('GetData',$DataId,compact('record_id','last_updated'));
        if($Data) $this->bag->store('Data',$DataId,$Data);
        $this->bag->store('FormData',$this->bag->r('form_id'),[$DataId => $record_id]);
    }

}