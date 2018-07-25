<?php

namespace Milestone\Appframe;

class Role extends Model
{
    protected $table = '__roles';

    public function Resources(){
        return $this->belongsToMany(Resource::class, '__resource_roles', 'role', 'resource');
    }
}
