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

    public function scopeSetupUser($Q){
        return $Q->whereHas('Groups',function($Q){ $Q->whereIn('name',['developers','administrators']); });
    }

    public function scopeAdministratorUser($Q){
        return $Q->whereHas('Groups',function($Q){ $Q->whereNotIn('name',['developers','setup_user']); });
    }
}
