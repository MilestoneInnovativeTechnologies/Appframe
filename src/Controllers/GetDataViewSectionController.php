<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceData;

class GetDataViewSectionController extends Controller
{

    public function index(){
        $ResDataId = $this->bag->r('data_id');
        $ResData = ResourceData::with(['Sections' => function($Q){ $Q->with(['Relation','Items.Relation']); }])->find($ResDataId);
        $this->bag->store('DataViewSection',$ResDataId,$ResData->Sections);
    }

}