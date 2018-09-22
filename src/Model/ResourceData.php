<?php

namespace Milestone\Appframe\Model;

class ResourceData extends Model
{
    protected $table = '__resource_data';

    public function Relations(){
        return $this->hasMany(ResourceDataRelation::class, 'resource_data','id');
    }

    public function Resource(){
        return $this->belongsTo(Resource::class, 'resource','id');
    }

    public function Scopes(){
        return $this->hasMany(ResourceDataScope::class, 'resource_data','id');
    }

    public function Sections(){
        return $this->hasMany(ResourceDataViewSection::class, 'resource_data','id');
    }

}
