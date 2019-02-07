<?php

namespace Milestone\Appframe\Model;

use Illuminate\Database\Eloquent\Builder;

class Group extends Model
{
    protected $table = '__groups';
    protected static function boot(){
        parent::boot();
        static::addGlobalScope('withoutSetup', function (Builder $builder) {
            $builder->where(function($Q){ $Q->whereNotIn('name',['setup_user','developers']); });
        });
    }
    public function Users(){
        return $this->belongsToMany(User::class, '__group_users', 'group', 'role')->withTimestamps();
    }

    public function Roles(){
        return $this->belongsToMany(Role::class, '__group_roles', 'group', 'role')->withTimestamps();
    }
}
