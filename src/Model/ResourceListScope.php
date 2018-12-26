<?php

namespace Milestone\Appframe\Model;

class ResourceListScope extends Model
{
    protected $table = '__resource_list_scopes';

    public function List(){
        return $this->belongsTo(ResourceList::class,'resource_list','id');
    }

    public function Scope(){
        return $this->belongsTo(ResourceScope::class,'scope','id');
    }
}
