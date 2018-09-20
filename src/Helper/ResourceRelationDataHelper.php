<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceRelation;

class ResourceRelationDataHelper
{
    private $id;
    public $record;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $ResRelation = ResourceRelation::with(['Owner'])->find($this->id);
        $Resource = $this->getClassModel($this->getResourceClass($ResRelation->Owner),$this->record);
        return $Resource->{ $ResRelation->method };
    }

    private function getResourceClass($Res){
        return implode("\\",[$Res->namespace,$Res->name]);
    }

    private function getClassModel($Class, $Rec = null){
        return ($Rec) ? (new $Class)->find($Rec) : new $Class;
    }
}