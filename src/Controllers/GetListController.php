<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $Data = $this->getORMData($id); $ORM = $this->getListORM($Data);
        $Data = $ORM->get();
        $this->store($id,$Data);
    }

    private function getORMData($id){
        return ($this->hasInSession($id) && $this->bag->r('update') === true)
            ? $this->getFromSession($id)
            : $this->getPreparedORM($id);
    }

    private function hasInSession($id){
        return $this->bag->session('List') && array_key_exists($id,$this->bag->session('List'));
    }

    private function getFromSession($id){
        return $this->bag->session('List')[$id];
    }

    private function getPreparedORM($id){
        $List = Helper::Help('List',$id);
        $this->bag->push('List',$id,$List);
        $this->bag->store('ListData',$id,array_except($List,['orm','layout']));
        $this->bag->store('ListLayout',$id,$List['layout']);
        return $List;
    }

    private function getORMFromAttributes($Class,$With,$Scopes){
        $ORM = new $Class;
        $ORM = ($With && !empty($With)) ? $ORM->with($With) : $ORM;
        if($Scopes && !empty($Scopes)){
            foreach($Scopes as $Scope){
                $attrs = $Scope[1]; $method = $Scope[0];
                if(empty($attrs)) $ORM = $ORM->$method();
                if(count($attrs) === 1) $ORM = $ORM->$method($attrs[0]);
                if(count($attrs) === 2) $ORM = $ORM->$method($attrs[0],$attrs[1]);
                if(count($attrs) === 3) $ORM = $ORM->$method($attrs[0],$attrs[1],$attrs[2]);
            }
        }
        return $ORM;
    }

    private function getListORM($Data){
        $orm = $Data['orm']; $items = $Data['items']; $last = $Data['last']; $page = $this->bag->r('item.page') ?: 1; $skip = ($page-1) * $items;
        $ORM = $this->getORMFromAttributes($orm['Class'],$orm['With'],$orm['Scopes']);
        if($skip === 0) $ORM = ($last) ? $ORM->where('updated_at','>',date('Y-m-d H:i:s',strtotime($last))) : $ORM->take($items);
        else $ORM = $ORM->skip($skip)->take($items);
        return $ORM;
    }

    private function store($id,$Data){
        $this->bag->store('List',$id,$Data);
        $SData = $this->getFromSession($id);
        $SLast = $SData['last']; $LLast = $Data->max('updated_at');
        $Last = (strtotime($LLast) > strtotime($SLast)) ? $LLast : $SLast;
        $this->updateLast($id,$Last);
    }

    private function updateLast($id,$Last){
        $Data = $this->getFromSession($id);
        $Data['last'] = $Last;
        $this->bag->push('List',$id,$Data);
    }

}