<?php

namespace Milestone\Appframe\Model;

class ResourceRelation extends Model
{
    protected $table = '__resource_relations';

    public function Nest(){
        return $this->hasMany(ResourceRelation::class,'resource','relate_resource');
    }

    public function Resource(){
        return $this->belongsTo(Resource::class,'relate_resource', 'id');
    }
}
