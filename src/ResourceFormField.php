<?php

namespace Milestone\Appframe;

class ResourceFormField extends Model
{
    protected $table = '__resource_form_fields';

    public function Attributes(){
        return $this->hasMany(ResourceFormFieldAttr::class, 'form_field', 'id');
    }

    public function Options(){
        return $this->hasOne(ResourceFormFieldOption::class, 'form_field', 'id');
    }

    public function Validations(){
        return $this->hasMany(ResourceFormFieldValidation::class, 'form_field', 'id');
    }

    public function Data(){
        return $this->hasOne(ResourceFormFieldData::class,'form_field','id');
    }
}
