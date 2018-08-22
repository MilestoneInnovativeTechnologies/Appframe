<?php

namespace Milestone\Appframe\Model;

class ResourceList extends Model
{
    protected $table = '__resource_lists';

    public function Resource(){
        return $this->belongsTo(Resource::class,'resource','id');
    }

    public function Relations(){
        return $this->hasMany(ResourceListRelation::class,'resource_list','id');
    }

    public function Scopes(){
        return $this->belongsToMany(ResourceScope::class,'__resource_list_scopes','resource_list','scope')->withTimestamps();
    }
}