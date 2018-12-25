<?php

namespace Milestone\Appframe\Model;

class ResourceFormLayout extends Model
{
    protected $table = '__resource_form_layout';

    public function Form(){
        return $this->belongsTo(ResourceForm::class,'resource_form', 'id');
    }

    public function Field(){
        return $this->belongsTo(ResourceFormField::class,'form_field', 'id');
    }
}
