<?php

namespace Milestone\Appframe\Model;

class Resource extends Model
{
    protected $table = '__resources';
    protected $hidden = ['namespace','table','key','controller','controller_namespace'];

    public function Roles(){
        return $this->belongsToMany(Role::class,'__resource_roles','resource','role')->withTimestamps();
    }

    public function Actions(){
        return $this->hasMany(ResourceAction::class,'resource','id');
    }

    public function Forms(){
        return $this->hasMany(ResourceForm::class,'resource','id');
    }

    public function Relations(){
        return $this->hasMany(ResourceRelation::class,'resource','id');
    }

    public function Scopes(){
        return $this->hasMany(ResourceScope::class,'resource','id');
    }

    public function Dashboards(){
        return $this->hasMany(ResourceDashboard::class,'resource','id');
    }
}
