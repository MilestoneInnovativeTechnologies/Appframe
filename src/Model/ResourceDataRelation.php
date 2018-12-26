<?php

namespace Milestone\Appframe\Model;

class ResourceDataRelation extends Model
{
    protected $table = '__resource_data_relations';

    public function Data(){
        return $this->belongsTo(ResourceData::class,'resource_data','id');
    }

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }

    public function NRelation(){
        return $this->belongsTo(ResourceRelation::class,'nest_relation1','id');
    }
}
