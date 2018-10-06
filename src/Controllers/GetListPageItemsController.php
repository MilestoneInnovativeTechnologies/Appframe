<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListPageItemsController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id'); $page = $this->bag->r('page') ?: 1;
        $ORM = $this->getListORM($this->getListDetails($id),$page);
        $items = $ORM->pluck('id');
        $this->store($id,$page,$items);
    }

    private function getListDetails($id){
        return $this->bag->session('List')[$id];
    }

    private function getListORM($Data,$Page){
        $orm = $Data['orm']; $orm['Page'] = $Page; $orm['Take'] = $Data['items'];
        return Helper::Help('GetOrm',$orm['Class'],array_except($orm,'Class'));
    }

    private function store($id,$page,$items){
        $this->bag->store('ListPageItems',$id,[ $page => $items ]);
    }

}