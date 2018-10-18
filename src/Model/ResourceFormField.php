<?php

namespace Milestone\Appframe\Model;

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

    public function Form(){
        return $this->belongsTo(ResourceForm::class,'resource_form','id');
    }

    public function Depends(){
        return $this->hasMany(ResourceFormFieldDepend::class, 'form_field', 'id');
    }

    public function Dynamics(){
        return $this->hasMany(ResourceFormFieldDynamic::class, 'form_field', 'id');
    }
}
