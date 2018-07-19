<?php

namespace Milestone\Appframe;

class User extends Model
{
    protected $guarded = [];
    protected $table = 'users';
    protected $with = ['Groups'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = \Hash::make($value);
    }

    public function Groups(){
        return $this->belongsToMany(Group::class, '__group_users', 'user', 'group')->withTimestamps();
    }
}
