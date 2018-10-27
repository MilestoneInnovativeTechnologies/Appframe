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

    public function Layout(){
        return $this->hasMany(ResourceListLayout::class,'resource_list','id');
    }

    public function Scopes(){
        return $this->belongsToMany(ResourceScope::class,'__resource_list_scopes','resource_list','scope')->withTimestamps();
    }

    public function Actions(){
        return $this->belongsToMany(ResourceAction::class,'__resource_action_lists','resource_list','resource_action')->withTimestamps();
    }

    public function Search(){
        return $this->hasMany(ResourceListSearch::class,'resource_list','id');
    }
}
