<?php

namespace Milestone\Appframe\Model;

class ResourceForm extends Model
{
    protected $table = '__resource_forms';

    public function Fields(){
        return $this->hasMany(ResourceFormField::class, 'resource_form', 'id');
    }

    public function Resource(){
        return $this->belongsTo(Resource::class, 'resource', 'id');
    }

    public function Defaults(){
        return $this->hasMany(ResourceFormDefault::class, 'resource_form', 'id');
    }
}
