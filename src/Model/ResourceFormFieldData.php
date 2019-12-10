<?php

namespace Milestone\Appframe\Model;

class ResourceFormFieldData extends Model
{
    protected static function boot(){
        parent::boot();
        static::creating(function($model){ if(!$model->attribute) return false; });
    }

    protected $table = '__resource_form_field_data';
    protected $with = ['Relation'];

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }
}
