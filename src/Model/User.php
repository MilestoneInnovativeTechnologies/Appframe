<?php

namespace Milestone\Appframe\Model;

use App\User as NativeUser;

class User extends NativeUser
{

    public function setPasswordAttribute($value){
        $this->attributes['password'] = \Hash::make($value);
    }

    public function Groups(){
        return $this->belongsToMany(Group::class, '__group_users', 'user', 'group')->withTimestamps();
    }

    public function scopeAdministrators($Q){
        return $Q->whereHas('Groups',function($Q){ $Q->where('name','administrators'); });
    }

    public function scopeDevelopers($Q){
        return $Q->whereHas('Groups',function($Q){ $Q->where('name','developers'); });
    }
}
