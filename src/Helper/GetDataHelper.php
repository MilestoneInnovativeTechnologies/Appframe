<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceData;

class GetDataHelper
{
    private $id;
    public $record_id, $last_updated = 0;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $ResData = ResourceData::with(['Resource','Relations','Scopes'])->find($this->id);
        $Model = $this->getResourceModel($ResData->Resource);
        $Relations = $this->getWithRelations($ResData->Relations);
        $Scopes = $this->getScopes($ResData->Scopes);
        return $this->getData($Model,$this->record_id,$Relations,$Scopes,$this->last_updated);
    }

    private function getResourceModel($Res){
        $Class = $this->getResourceClass($Res);
        return new $Class;
    }

    private function getResourceClass($Res){
        return implode("\\",[$Res->namespace,$Res->name]);
    }

    private function getWithRelations($Relations){
        if(!$Relations || $Relations->isEmpty()) return null;
        return $Relations->map(function ($item){
            $relations = Helper::Help('DeepRelation',$item);
            return Helper::Help('ChainRelation',$relations,['json' => false]);
        })->toArray();
    }

    private function getScopes($Scopes){
        if($Scopes->isEmpty()) return null;
        return $Scopes->map(function($item){
            return [$item->method,collect($item)->only(['arg1','arg2','arg3'])->filter()->toArray()];
        })->toArray();
    }

    private function getData($Model,$Id,$With,$Scopes,$Updated = 0){
        $ORM = $this->getScopeApplied($Model,$Scopes);
        $ORM = ($With) ? $ORM->with($With) : $ORM;
        return $ORM->where('updated_at','>',$Updated)->find($Id);
    }

    private function getScopeApplied($Model,$Scopes){
        if(!$Scopes || empty($Scopes)) return $Model->query();
        foreach($Scopes as $Scope){
            $method = $Scope[0]; $args = $Scope[1];
            call_user_func_array([$Model,$method],$args);
        }
        return $Model;
    }
}