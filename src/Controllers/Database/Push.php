<?php

namespace Milestone\Appframe\Controllers\Database;
use Illuminate\Support\Arr;

class Push
{

    protected $Group, $baseModel;
    protected $Native, $Relation;
    public $Model;

    public function __construct($Array, $Model)
    {
        $this->Group = $Array; $this->baseModel = $Model;
        $this->Native = array_key_exists("",$Array) ? $Array[""] : null; $this->Relation = Arr::except($Array,"");
        $this->push();
    }

    private function push(){
        $this->updateNative();
        if($this->Relation && !empty($this->Relation))
            $this->updateRelations($this->Relation);
    }

    private function updateNative(){
        $Model = $this->baseModel; $Native = $this->Native;
        if(!$Native || empty($Native) || empty($Native['data'])) return $this->Model = $this->baseModel;
        foreach(array_shift($Native['data']) as $attribute => $value) $Model->$attribute = $value;
        $Model->save(); return $this->Model = $Model;
    }

    private function updateRelations($Relations){
        foreach($Relations as $path => $data){
            PushRelation::save($this->Model,$data);
        }
    }

}