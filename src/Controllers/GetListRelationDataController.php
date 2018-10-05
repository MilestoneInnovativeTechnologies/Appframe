<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListRelationDataController extends Controller
{

    public function index(){
        $relation_id = $this->bag->r('relation_id');
        $list_id = $this->bag->r('list_id');
        $record_id = $this->bag->r('record_id');
        $Keys = $this->getRelationKeys($relation_id,$record_id);
        //$this->bag->r('get',$Keys);
        $this->store($list_id,$relation_id,$record_id,$Keys);
    }

    private function getRelationKeys($relation_id,$record_id){
        $Relations = Helper::Help('ResourceRelationData',$relation_id,[ 'record' => $record_id ]);
        return ($Relations && $Relations->isNotEmpty())
            ? $Relations->pluck('id')->toArray()
            : null;
    }

    private function store($list,$relation,$record,$data){
        $this->bag->store('ListRelation',$list,[ $relation => [ $record => $data ] ]);
    }

}