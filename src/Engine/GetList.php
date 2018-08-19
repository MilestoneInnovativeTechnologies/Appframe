<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\Resource;
use Milestone\Appframe\ResourceList;
use Milestone\Appframe\ResourceRelation;

class GetList extends Base
{
    /*
     * This engine will be included once all the conditions
     * in this array succeeded
     * The key will be matched against request()->input() to value.
     * If value is plain text, string comparison performs
     * If value starting with @, predefined method check will performs
     *
     */
    static $on = [
        'item.type' => 'List',
        'item.item' =>  '@isNotEmpty',
    ];

    /*
     * The things to be return with response are needed to be store into bag
     * $this->bag->store(name,id,data)
     * where name will be the root property name in response having data indexed by id
     * The things to keep in bag are kept by calling
     * $this->bag->keep(name,data)
     * To get the kept data out of bag, call
     * $this->bag->get(name)
     */
    public function boot(){
        $id = $this->bag->r('item.item');
        $Data = $this->getORMData($id); $ORM = $this->getListORM($Data);
        $Data = $ORM->get();
        $this->store($id,$Data);
    }

    private function getORMData($id){
        return $this->hasInSession($id)
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
        $Data = ResourceList::with('Resource','Relations','Scopes')->find($id);
        $List = $this->getExtractData($Data);
        $this->bag->push('List',$id,$List);
        $this->bag->store('ListData',$id,array_except($List,['orm']));
        return $List;
    }

    private function getExtractData($Data){
        $items = $Data->items_per_page;
        $relations = $this->getRelations($Data->Relations);
        $last = 0;
        $orm = $this->getExtractORM($Data);
        return compact('orm','relations','items','last');
    }

    private function getRelations($Relations){
        if($Relations->isEmpty()) return null;
        return $Relations->map(function ($item){
            return collect($item)->only(['relation','relation1','relation2','relation3','relation4','relation5'])->filter()->implode('.');
        })->toArray();
    }

    private function getExtractORM($Data){
        $Class = $this->getResourceClass($Data->Resource);
        $With = $this->getWithRelations($Data->Relations);
        $Scopes = $this->getScopes($Data->Scopes);
        return compact('Class','With','Scopes');
    }

    private function getResourceClass($res){
        return implode('\\',[$res->namespace,$res->name]);
    }

    private function getWithRelations($Relations){
        if($Relations->isEmpty()) return [];
        $with = [];
        $Relations->each(function ($item) use(&$with) {
            $RelDeep = collect($item)->only(['relation','relation1','relation2','relation3','relation4','relation5'])->values()->filter();
            array_push($with, $this->getRelationDeep($RelDeep));
        });
        return $with;
    }

    private function getScopes($Scopes){
        if($Scopes->isEmpty()) return null;
        return $Scopes->map(function($item){
            return [$item->method,collect($item)->only(['arg1','arg2','arg3'])->filter()->toArray()];
        });
    }

    private function getRelationDeep($Coll){
        $relation = []; $parent = null;
        $Coll->each(function($item) use(&$relation,&$parent) {
            $name = ($parent)
                ? ResourceRelation::where('resource',$parent)->where('relate_resource',$item)->first()->method
                : Resource::find($item)->name;
            array_push($relation,$name); $parent = $item;
        });
        return implode(".",$relation);
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