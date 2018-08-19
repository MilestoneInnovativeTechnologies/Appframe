<?php

namespace Milestone\Appframe\Engine\Database;

class RelationBind
{
    private $typeMethod = [
        'hasOne' => 'save',
        'hasMany' => 'save',
        'belongsTo' => 'associate',
        'belongsToMany' => 'attach',
    ];

    protected $baseModel, $Data, $relMethod, $relType;
    protected $relClass;
    protected $method, $attribute;

    public function __construct($baseModel, $data, $relMethod, $relType, $relClass = null)
    {
        $this->baseModel = $baseModel;
        $this->Data = $data;
        $this->relMethod = $relMethod;
        $this->relType = $relType;
        $this->relClass = $relClass;
        $this->setUp();
        return $this;
    }

    private function setUp(){
        $this->setMethod();
        $this->setAttribute();
    }

    private function setMethod($method = null){
        $this->method = $method ?: $this->typeMethod[$this->relType];
    }

    private function setAttribute(){
        $this->attribute = (in_array($this->method,['associate','attach']))
            ? $this->getArrayData()
            : $this->getModelData();
    }

    private function getArrayData(){
        $data = $this->Data;
        if(is_array($data)) return $data;
        if(is_numeric($data) || is_string($data)) return [$data];
        return (array) $data;
    }

    private function getModelData(){
        $data = $this->getAssociateArrayData();
        return ($this->method == 'save') ? $this->getSaveModel($data) : $this->getSaveMultipleModel($data) ;
    }

    private function getAssociateArrayData(){
        $data = $this->Data;
        if(is_array($data)){
            if(is_array($data[0])) $this->setMethod('saveMany');
            return $data;
        }
        return null;
    }

    private function getSaveModel($data){
        $Class = $this->relClass;
        $Model = new $Class; $Model->forceFill($data);
        return $Model;
    }

    private function getSaveMultipleModel($data){
        $dataArray = [];
        foreach($data as $record) $dataArray[] = $this->getSaveModel($record);
        return $dataArray;
    }

    public function go(){
        $base = $this->baseModel;
        $relation = $this->relMethod;
        $method = $this->method;
        $attribute = $this->attribute;
        $base->$relation()->$method($attribute);
        return $base;
    }


}