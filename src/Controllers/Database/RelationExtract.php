<?php

namespace Milestone\Appframe\Controllers\Database;


class RelationExtract
{
    protected $relation, $resource, $relate, $data;
    public $resourceModel, $relationGrouped;
    private $relateClass, $relatePath, $relateType, $relateData;

    public function __construct($Relation)
    {
        $this->relation = $Relation;
        $this->resource = $Relation->Owner;
        $this->relate = $Relation->Resource;
    }

    public function process($record = null, $Data = []){
        $this->data = $Data;
        return $this->initialize($record);
    }

    private function initialize($record){
        $this->resourceModel = $this->getClassModel($this->getResourceClass($this->resource),$record);
        $this->setRelateDetails();
        $this->relationGrouped = collect([$this->getComposeElement(),$this->getRelateComposeElement()])->keyBy->path;
        return $this;
    }

    private function getResourceClass($resource){
        return implode("\\",[$resource->namespace,$resource->name]);
    }

    private function getClassModel($Class,$record){
        return ($record) ? (new $Class)->find($record) : new $Class;
    }

    private function setRelateDetails(){
        $this->relateClass = $this->getResourceClass($this->relate);
        $this->relatePath = $this->relation->method;
        $this->relateType = $this->relation->type;
        $this->relateData = [[ 'value' => $this->data, 'attribute' => null ]];
    }

    private function getComposeElement($path = '', $type = '', $class = '', $data = []){
        return compact('path','type','class','data');
    }

    private function getRelateComposeElement(){
        return $this->getComposeElement($this->relatePath, $this->relateType, $this->relateClass, $this->relateData);
    }

}