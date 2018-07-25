<?php

namespace Milestone\Appframe;

class Group extends Model
{
    protected $table = '__groups';

    public function Roles(){
        return $this->belongsToMany(Role::class, '__group_roles', 'group', 'role');
    }
}
