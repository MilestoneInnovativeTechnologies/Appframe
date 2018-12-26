<?php

namespace Milestone\Appframe\Model;

class ResourceListSearch extends Model
{
    protected $table = '__resource_list_search';

    public function List(){
        return $this->belongsTo(ResourceList::class,'resource_list','id');
    }

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }
}
