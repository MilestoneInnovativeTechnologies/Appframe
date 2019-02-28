<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Arr;
use Milestone\Appframe\Helper\Helper;

class GetListSearchItemsController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id'); $term = $this->bag->r('term');
        $search = Helper::Help('GetListSearch',$id,compact('term'));
        $ORM = $this->getListORM($this->getListDetails($id),$search);
        $items = $ORM->pluck('id');
        $this->store($id,$term,$items);
    }

    private function getListDetails($id){
        return $this->bag->session('List')[$id];
    }

    private function getListORM($Data,$Search){
        $orm = $Data['orm']; $orm['Search'] = $Search; $orm['Take'] = 0;
        return Helper::Help('GetOrm',$orm['Class'],Arr::except($orm,'Class'));
    }

    private function store($id, $term, $items){
        $this->bag->store('ListSearchItems',$id,[ $term => $items ]);
    }

}