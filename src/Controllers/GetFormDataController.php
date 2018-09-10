<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceData;

class GetFormDataController extends Controller
{

    public function index(){
        $DataId = $this->bag->r('data'); $RecId = $this->bag->r('record');
        $ResData = ResourceData::find($DataId);
        $Res = Resource::find($ResData->resource);
        $Class = implode('\\',[$Res->namespace,$Res->name]);
        $updatedAt = $this->bag->req('last_updated') ?: 0;
        $Data = (new $Class)->where('updated_at','>',$updatedAt)->find($RecId);
        $this->bag->store('Data',$DataId,$Data); $this->bag->store('FormData',$this->bag->r('form'),[$DataId => $RecId]);
    }

}