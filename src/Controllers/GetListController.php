<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Str;
use Milestone\Appframe\Model\ResourceList;
use Milestone\Appframe\Model\ResourceRelation;

class GetListController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $Data = $this->getORMData($id); $ORM = $this->getListORM($Data);
        $Data = $ORM->get();
        $this->store($id,$Data);
    }
    private $RelationCache = [];

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
        $Data = ResourceList::with('Resource','Relations','Scopes','Layout')->find($id);
        $List = $this->getExtractData($Data);
        $this->bag->push('List',$id,$List);
        $this->bag->store('ListData',$id,array_except($List,['orm','layout']));
        $this->bag->store('ListLayout',$id,$List['layout']);
        return $List;
    }

    private function getExtractData($Data){
        $items = $Data->items_per_page; $title = $Data->title;
        $relations = $this->getRelations($Data->Relations);
        $layout = $this->getLayout($Data->Layout,$Data->resource);
        $last = 0;
        $orm = $this->getExtractORM($Data);
        return compact('orm','relations','items','last','title','layout');
    }

    private function getRelations($Relations){
        if($Relations->isEmpty()) return null;
        return $Relations->map(function ($item){
            $relDeep = collect($item)->only(['relation','nest_relation1','nest_relation2','nest_relation3','nest_relation4','nest_relation5'])->filter()->values();
            return $this->getRelationDeep($relDeep);
        })->toArray();
    }

    private function getLayout($Layout,$resId){
        return ($Layout->isEmpty()) ? ['ID' => 'id'] : $Layout->mapWithKeys(function($layout) use($resId){
            return [$layout->label => $this->getLayoutProps($layout,$resId)];
        });
    }

    private function getLayoutProps($layout,$resId){
        $With = $this->getWithRelations(collect([$layout]),$resId)[0];
        $path = ($With) ? $With = implode(".",array_map(function($rel){ return Str::snake($rel); },explode(".",$With))) : $With;
        $field = $layout->field;
        return ['field' => $field, 'path' => $path];
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
            $RelDeep = collect($item)->only(['relation','nest_relation1','nest_relation2','nest_relation3','nest_relation4','nest_relation5'])->values()->filter();
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
        $relation = [];
        $Coll->each(function($item) use(&$relation) {
            $name = ($this->RelationCache && array_key_exists($item,$this->RelationCache))
                ? $this->RelationCache[$item]
                : ResourceRelation::find($item)->method;
            array_push($relation,$name); $this->RelationCache[$item] = $name;
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