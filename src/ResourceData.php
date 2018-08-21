<?php

namespace Milestone\Appframe;

class ResourceData extends Model
{
    protected $table = '__resource_data';

    public function Relations(){
        return $this->hasMany(ResourceDataRelation::class, 'resource_data','id');
    }

    public function Resource(){
        return $this->belongsTo(ResourceDataRelation::class, 'resource','id');
    }
}
