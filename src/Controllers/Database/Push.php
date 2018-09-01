<?php

namespace Milestone\Appframe\Controllers\Database;

class Push
{

    protected $Group, $baseModel;
    protected $Native, $Relation;
    public $Model;

    public function __construct($Array, $Model)
    {
        $this->Group = $Array; $this->baseModel = $Model;
        $this->Native = $Array[""]; $this->Relation = array_except($Array,"");
        $this->push();
    }

    private function push(){
        $this->updateNative();
        if($this->Relation && !empty($this->Relation))
            $this->updateRelations($this->Relation);
    }

    private function updateNative(){
        $Model = $this->baseModel; $Native = $this->Native;
        if(empty($Native) || empty($Native['data'])) return $this->Model = $this->baseModel;
        foreach($Native['data'] as $Ary) $Model->{$Ary['attribute']} = $Ary['value'];
        $Model->save(); return $this->Model = $Model;
    }

    private function updateRelations($Relations){
        foreach($Relations as $path => $data){
            PushRelation::save($this->Model,$data);
        }
    }

}