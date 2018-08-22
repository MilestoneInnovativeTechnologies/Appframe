<?php

namespace Milestone\Appframe\Model;

class ResourceFormFieldData extends Model
{
    protected $table = '__resource_form_field_data';
    protected $with = ['Relation'];

    public function Relation(){
        return $this->belongsTo(Resource::class,'relation','id');
    }
}
