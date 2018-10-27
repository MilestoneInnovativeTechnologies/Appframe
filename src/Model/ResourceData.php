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
        return $this->belongsToMany(ResourceScope::class,'__resource_data_scopes','resource_data','scope')->withTimestamps();
    }

    public function Actions(){
        return $this->belongsToMany(ResourceAction::class,'__resource_action_data','resource_data','resource_action')->withTimestamps();
    }

    public function Sections(){
        return $this->hasMany(ResourceDataViewSection::class, 'resource_data','id');
    }

}
