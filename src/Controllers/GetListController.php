<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $ORM = $this->getListORM($this->getListDetails($id));
        $FilterKeys = $this->bag->get('ListIds');
        $Data = ($FilterKeys && !empty($FilterKeys)) ? $ORM->find($FilterKeys) : $ORM->get(); $this->store($id,$Data);
    }

    private function getListDetails($id){
        return $this->bag->session('List')[$id];
    }

    private function getListORM($Data){
        $orm = $Data['orm']; $items = $Data['items']; $last = $Data['last']; $page = $this->bag->r('item.page') ?: 1; $skip = ($page-1) * $items;
        $orm['Where'] = ['updated_at' => ($last) ? date('Y-m-d H:i:s',strtotime($last)) : 0, 'updated_at:operator' => '>'];
        $orm['Take'] = $items; $orm['Page'] = $this->bag->r('item.page') ?: 0;
        return Helper::Help('GetOrm',$orm['Class'],array_except($orm,'Class'));
    }

    private function store($id,$Data){
        $this->bag->store('List',$id,$Data);
        $SData = $this->getListDetails($id);
        $SLast = $SData['last']; $LLast = $Data->max('updated_at');
        $Last = (strtotime($LLast) > strtotime($SLast)) ? $LLast : $SLast;
        $this->updateLast($id,$Last);
    }

    private function updateLast($id,$Last){
        $Data = $this->getListDetails($id);
        $Data['last'] = $Last;
        $this->bag->push('List',$id,$Data);
    }

}