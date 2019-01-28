<?php

namespace Milestone\Appframe\Model;

class ResourceDefault extends Model
{
    protected $table = '__resource_defaults';

    public function Resource(){ return $this->belongsTo(Resource::class,'resource','id'); }
    public function List(){ return $this->belongsTo(ResourceAction::class,'list','id')->with('Method'); }
    public function Form(){ return $this->belongsTo(ResourceAction::class,'create','id')->with('Method'); }
    public function Data(){ return $this->belongsTo(ResourceAction::class,'read','id')->with('Method'); }
    public function FormWithData(){ return $this->belongsTo(ResourceAction::class,'update','id')->with('Method'); }
}
