<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Arr;
use Milestone\Appframe\Helper\Helper;

class GetListController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $ORM = $this->getListORM($this->getListDetails($id));
        $FilterKeys = $this->bag->r('get');
        $Data = ($FilterKeys && !empty($FilterKeys)) ? $ORM->find($FilterKeys) : $ORM->get(); $this->store($id,$Data);
    }

    private function getListDetails($id){
        return $this->bag->session('List')[$id];
    }

    private function getListORM($Data){
        $orm = $Data['orm'];
        if($this->bag->r('get') === null){
            $last = $this->bag->r('update') ? $Data['last'] : 0;
            $orm['Where'] = ['updated_at' => ($last) ? date('Y-m-d H:i:s',strtotime($last)) : 0, 'updated_at:operator' => '>'];
            $orm['Take'] = $Data['items']; $orm['Page'] = 0;
        }
        return Helper::Help('GetOrm',$orm['Class'],Arr::except($orm,'Class'));
    }

    private function store($id,$Data){
        $this->bag->store('List',$id,$Data);
        if($this->bag->r('get') === null)
            $this->updateLast($id,$Data);

    }

    private function updateLast($id,$Data){
        $SData = $this->getListDetails($id);
        $SLast = $SData['last']; $LLast = $Data->max('updated_at');
        $Last = (strtotime($LLast) > strtotime($SLast)) ? $LLast : $SLast;
        $SData['last'] = $Last;
        $this->bag->push('List',$id,$SData);
    }

}