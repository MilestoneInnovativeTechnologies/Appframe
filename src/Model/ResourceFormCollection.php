<?php

namespace Milestone\Appframe\Model;

class ResourceFormCollection extends Model
{
    protected $table = '__resource_form_collection';

    public function Form(){
        return $this->belongsTo(ResourceForm::class,'collection_form','id');
    }

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class,'relation','id');
    }

    public function Field(){
        return $this->belongsTo(ResourceFormField::class,'foreign_field','id');
    }
}
