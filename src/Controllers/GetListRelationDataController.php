<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceRelation;

class GetListRelationDataController extends Controller
{

    public function index(){
        $relation_id = $this->bag->r('relation_id'); $list_id = $this->bag->r('list_id');
        $record_id = $this->bag->r('record_id'); $updated = $this->bag->r('updated') ?: 0;
        $Keys = $this->getRelationKeys($relation_id,$record_id);
        $data = ($Keys) ? $this->getListData($list_id,$Keys,$updated) : null;
        $this->store($list_id,$record_id,$data);
    }

    private function getRelationKeys($relation_id,$record_id){
        $ResourceRelation = ResourceRelation::with('Owner')->find($relation_id);
        $Model = $this->getOwnerModel($ResourceRelation,$record_id);
        return $this->getModelRelationKeys($Model,$ResourceRelation->method);
    }

    private function getOwnerModel($ResRel,$Rec){
        return $this->getClassModel($this->getResourceClass($ResRel->Owner), $Rec);
    }

    private function getResourceClass($resource){
        return implode("\\",[$resource->namespace,$resource->name]);
    }

    private function getClassModel($Class,$record_id){
        return (new $Class)->find($record_id);
    }

    private function getModelRelationKeys($Model,$Method){
        $Relations = $Model->$Method;
        return ($Relations && $Relations->isNotEmpty())
            ? $Relations->pluck('id')->toArray()
            : null;
    }

    private function getListData($list,$keys,$updated = 0){
        $ORM = $this->getListOrm($list);
        return $ORM->where('updated_at','>',$updated)->find($keys);
    }

    private function getListOrm($list){
        $Orm = $this->bag->session('List')[$list]['orm'];
        return $this->getOrm($Orm['Class'],$Orm['With'],$Orm['Scopes']);
    }

    private function getOrm($Class,$With,$Scopes){
        $ORM = new $Class;
        $ORM = ($With && !empty($With)) ? $ORM->with($With) : $ORM;
        if($Scopes && !empty($Scopes)) {
            foreach ($Scopes as $Scope) {
                $attrs = $Scope[1];
                $method = $Scope[0];
                $ORM = call_user_func_array([$ORM, $method], $attrs);
            }
        }
        return $ORM;
    }

    private function store($list,$record,$data){
        $this->bag->store('List',$list,$data);
        $this->bag->store('ListRelation',$list,[ $record => $data->pluck('id') ]);
    }

}