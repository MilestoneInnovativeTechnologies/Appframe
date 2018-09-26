<?php

namespace Milestone\Appframe\Controllers;

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
        $ORM = $this->getORMFromAttributes($orm['Class'],$orm['With'],$orm['Scopes']);
        if($skip === 0) $ORM = ($last) ? $ORM->where('updated_at','>',date('Y-m-d H:i:s',strtotime($last))) : $ORM->take($items);
        else $ORM = $ORM->skip($skip)->take($items);
        return $ORM;
    }

    private function getORMFromAttributes($Class,$With,$Scopes){
        $ORM = ($With && !empty($With)) ? (new $Class)->with($With) : new $Class;
        if($Scopes && !empty($Scopes)){
            foreach($Scopes as $Scope){
                $attrs = $Scope[1]; $method = $Scope[0];
                $ORM = call_user_func_array([$ORM, $method], $attrs);
            }
        }
        return $ORM;
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