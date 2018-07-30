<?php

namespace Milestone\Appframe;

class ResourceForm extends Model
{
    protected $table = '__resource_forms';

    public function Fields(){
        return $this->hasMany(ResourceFormField::class, 'resource_form', 'id');
    }
}
