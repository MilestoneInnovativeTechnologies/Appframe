<?php

namespace Milestone\Appframe\Model;

class ResourceListRelation extends Model
{
    protected $table = '__resource_list_relations';

    public function List(){
        return $this->belongsTo(ResourceList::class,'resource_list','id');
    }

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }

    public function NRelation(){
        return $this->belongsTo(ResourceRelation::class,'nest_relation1','id');
    }
}
