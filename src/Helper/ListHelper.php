<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceList;

class ListHelper
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $List = ResourceList::with('Resource','Relations','Scopes')->find($this->id);
        return $this->getListExtracts($List);
    }

    private function getListExtracts($List){
        $items = $List->items_per_page; $title = $List->title; $identity = $List->identity;
        $relations = $this->getRelations($List->Relations);
        $layout = Helper::Help('ListLayout',$List->id);
        $last = 0;
        $orm = $this->getExtractORM($List);
        $count = $this->getCountFromORM($orm);
        return compact('orm','relations','items','last','title','identity','layout','count');
    }

    private function getRelations($Relations){
        if($Relations->isEmpty()) return null;
        return $Relations->map(function ($item){
            $relations = Helper::Help('DeepRelation',$item);
            return Helper::Help('ChainRelation',$relations,['json' => false]);
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
            $relations = Helper::Help('DeepRelation',$item);
            $chained = Helper::Help('ChainRelation',$relations,['json' => false]);
            array_push($with, $chained);
        });
        return $with;
    }

    private function getScopes($Scopes){
        if($Scopes->isEmpty()) return null;
        return $Scopes->map(function($item){
            return [$item->method,collect($item)->only(['arg1','arg2','arg3'])->filter()->toArray()];
        });
    }

    private function getCountFromORM($orm){
        return 0;
    }

}