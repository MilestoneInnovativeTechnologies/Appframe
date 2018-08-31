<?php

namespace Milestone\Appframe\Controllers\Database;

use Milestone\Appframe\Bag;
use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceRelation;

class DatabaseBind
{
    protected $bag = null;
    protected $ResId = null;
    protected $Resource = null;
    protected $Model = null;
    protected $Data = [];
    protected $Relations = [];
    protected $RelationCache = [];
    protected $RelationId = [];

    public function __construct($ResId,$Form,$DataId = null)
    {
        $this->bag = resolve(Bag::class);
        $this->setResource($ResId);
        $this->setModel($DataId);
        $this->init($Form);
    }

    private function setResource($ResId){
        $this->ResId = $ResId;
        $this->Resource = Resource::find($ResId);
    }

    private function setModel($id){
        $class = $this->getResModelClass($this->Resource);
        $this->Model = ($id) ? (new $class)->find($id) : new $class;
    }

    private function getResModelClass($resource){
        return implode("\\",[$resource->namespace,$resource->name]);
    }

    private function init($Form){
        $Data = []; $Relations = [];
        extract($this->getDataAndRelations($Form));
        $this->Data = $Data; $this->Relations = $Relations;
    }

    private function getDataAndRelations($Form){
        $Data = []; $Relations = [];
        $Form->Fields->each(function($Field) use(&$Data, &$Relations) {
            if(!$Field->Data) return;
            $key = 'data.' . $Field->name; $value = $this->bag->req($key); $StoreTo = &$Data;
            $RelationKey = $this->getNestRelationKey($Field->Data);
            if($RelationKey){
                if(!array_key_exists($RelationKey,$Relations)) $Relations[$RelationKey] = [];
                $StoreTo = &$Relations[$RelationKey];
            }
            if($Field->Data->attribute) $StoreTo[$Field->Data->attribute] = $value;
            else $StoreTo[] = $value;
        });
        $Form->Defaults->each(function ($Default) use(&$Data, &$Relations){
            $value = $Default->value; $StoreTo = &$Data;
            $RelationKey = $this->getNestRelationKey($Default);
            if($RelationKey){
                if(!array_key_exists($RelationKey,$Relations)) $Relations[$RelationKey] = [];
                $StoreTo = &$Relations[$RelationKey];
            }
            if($Default->attribute) $StoreTo[$Default->attribute] = $value;
            else $StoreTo[] = $value;
        });
        return ['Data' => $Data,'Relations' => $Relations];
    }

    private function getNestRelationKey($Data){
        $Key = []; $Id = null;
        foreach (['relation','nest_relation1','nest_relation2','nest_relation3'] as $Rel){
            if($Data->$Rel) { $RelationDetails = $this->getRelationDetails($Data->$Rel); $Key[] = $RelationDetails['method']; $Id = $Data->$Rel; }
            else break;
        }
        if(empty($Key)) return [];
        $KeyString = implode('.',$Key); $this->RelationId[$KeyString] = $Id;
        return $KeyString;
    }

    private function getRelationDetails($relation){
        if(array_key_exists($relation,$this->RelationCache)) return $this->RelationCache[$relation];
        return $this->storeRelation($relation);
    }

    private function storeRelation($relation){
        $ResRelation = ResourceRelation::with('Resource')->find($relation);
        $class = $this->getResModelClass($ResRelation->Resource);
        return $this->RelationCache[$relation] = ['class' => $class,'method' => $ResRelation->method,'type' => $ResRelation->type];
    }
}