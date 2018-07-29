<?php

namespace Milestone\Appframe;

use App\User as NativeUser;

class User extends NativeUser
{

    protected $with = ['Groups.Roles.Resources'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = \Hash::make($value);
    }

    public function Groups(){
        return $this->belongsToMany(Group::class, '__group_users', 'user', 'group')->withTimestamps();
    }
}
