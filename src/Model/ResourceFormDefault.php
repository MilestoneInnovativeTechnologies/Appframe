<?php

namespace Milestone\Appframe\Model;

class ResourceFormDefault extends Model
{
    protected $table = '__resource_form_defaults';
    protected $with = ['Relation'];

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }
}
