<?php

namespace Milestone\Appframe\Controllers;

class ListRelationUpdatedController extends Controller
{

    public function index(){
        $submit = $this->bag->get('Submit'); $list = $this->bag->r('list_id'); $relation = $this->bag->r('relation_id');
        $record = $this->bag->r('record_id'); $data = $this->bag->r('relations');
        if(!!$submit) $this->bag->store('ListRelationUpdated',$list,[ $relation => [ $record => $data ] ]);
    }


}