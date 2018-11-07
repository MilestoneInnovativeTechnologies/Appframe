<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceRelation;

class UpdateRelationController extends Controller
{

    public function index(){
        $relation_id = $this->bag->r('relation_id'); $relations = $this->bag->r('relations'); $record_id = $this->bag->r('record_id');
        $Relation = ResourceRelation::with(['Owner','Resource'])->find($relation_id);
        $Model = $this->getResourceModel($Relation->Owner,$record_id); $Method = $Relation->method;
        $Submit = $Model->$Method()->sync($relations);
        $this->bag->keep('Submit',$Submit);
    }

    private function getResourceModel($resource,$id = null){
        $Class = implode('\\',[$resource->namespace,$resource->name]);
        return ($id) ? (new $Class)->find($id) : new $Class;
    }


}
