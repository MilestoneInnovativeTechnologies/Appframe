<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceData;

class GetDataController extends Controller
{

    public function index(){
        $ResDataId = $this->bag->r('data_id'); $RecId = $this->bag->r('record_id');
        $ResData = ResourceData::find($ResDataId);
        $Res = Resource::find($ResData->resource);
        $Class = implode('\\',[$Res->namespace,$Res->name]);
        $updatedAt = $this->bag->req('last_updated') ?: 0;
        $Data = (new $Class)->where('updated_at','>',$updatedAt)->find($RecId);
        $this->bag->store('Data',$ResDataId,$Data); $this->bag->store('DataDetails',$ResDataId,$ResData);
    }

}