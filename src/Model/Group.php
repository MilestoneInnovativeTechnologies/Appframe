<?php

namespace Milestone\Appframe\Model;

class Group extends Model
{
    protected $table = '__groups';

    public function Users(){
        return $this->belongsToMany(User::class, '__group_users', 'group', 'role')->withTimestamps();
    }

    public function Roles(){
        return $this->belongsToMany(Role::class, '__group_roles', 'group', 'role')->withTimestamps();
    }
}
