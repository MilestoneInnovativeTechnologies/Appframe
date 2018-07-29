<?php

namespace Milestone\Appframe;

class Resource extends Model
{
    protected $table = '__resources';

    public function Roles(){
        return $this->belongsToMany(Role::class,'__resource_roles','resource','role')->withTimestamps();
    }

    public function Actions(){
        return $this->hasMany(ResourceAction::class,'resource','id');
    }
}
