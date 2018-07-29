<?php

namespace Milestone\Appframe;

class Role extends Model
{
    protected $table = '__roles';

    public function Resources(){
        return $this->hasMany(ResourceRole::class, 'role',  'id');
    }

    public function Groups(){
        return $this->belongsToMany(Group::class, '__group_roles', 'role', 'group')->withTimestamps();
    }
}
