<?php

namespace Milestone\Appframe\Model;

class ResourceListLayout extends Model
{
    protected $table = '__resource_list_layout';

    public function List(){
        return $this->belongsTo(ResourceList::class,'resource_list','id');
    }
}
