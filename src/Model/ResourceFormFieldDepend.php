<?php

namespace Milestone\Appframe\Model;

class ResourceFormFieldDepend extends Model
{
    protected $table = '__resource_form_field_depends';

    public function Field(){
        return $this->belongsTo(ResourceFormField::class, 'form_field', 'id');
    }
}
