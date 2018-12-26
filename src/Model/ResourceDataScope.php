<?php

namespace Milestone\Appframe\Model;

class ResourceDataScope extends Model
{
    protected $table = '__resource_data_scopes';

    public function Data(){
        return $this->belongsTo(ResourceData::class,'resource_data','id');
    }

    public function Scope(){
        return $this->belongsTo(ResourceScope::class,'scope','id');
    }
}
