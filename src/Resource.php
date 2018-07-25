<?php

namespace Milestone\Appframe;

class Resource extends Model
{
    protected $table = '__resources';

    public function Actions(){
        return $this->hasMany(ResourceAction::class,'resource','id');
    }
}
