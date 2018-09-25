<?php

namespace Milestone\Appframe\Model;

use Illuminate\Database\Eloquent\Model;

class ResourceFormFieldOption extends Model
{
    protected $table = '__resource_form_field_options';

    public function Field(){
        return $this->belongsTo(ResourceFormField::class,'form_field','id');
    }

}
