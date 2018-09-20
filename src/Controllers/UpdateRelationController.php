<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceRelation;

class UpdateRelationController extends Controller
{

    public function index(){
        $relation_id = $this->bag->r('relation_id'); $relations = $this->bag->r('relations'); $record_id = $this->bag->r('record_id');
        $Relation = ResourceRelation::with(['Owner','Resource'])->find($relation_id);
        $RelationExtract = (new Database\RelationExtract($Relation))->process($record_id,$relations);
        $Submit = new Database\Push($RelationExtract->relationGrouped->toArray(),$RelationExtract->resourceModel);
        $this->bag->keep('Submit',$Submit);
    }


}