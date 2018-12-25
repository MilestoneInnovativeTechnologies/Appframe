<?php

namespace Milestone\Appframe\Model;

class ResourceAction extends Model
{
    protected $table = '__resource_actions';

    public function Method(){
        return $this->hasOne(ResourceActionMethod::class,'resource_action','id');
    }

    public function Lists(){
        return $this->hasMany(ResourceActionList::class,'resource_action','id');
    }

    public function Data(){
        return $this->hasMany(ResourceActionData::class,'resource_action','id');
    }

    public function Resource(){
        return $this->belongsTo(Resource::class,'resource','id');
    }
}
