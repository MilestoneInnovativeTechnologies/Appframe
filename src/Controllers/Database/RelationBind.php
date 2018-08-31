<?php

namespace Milestone\Appframe\Controllers\Database;

class RelationBind
{
    private $typeMethod = [
        'hasOne' => 'save',
        'hasMany' => 'save',
        'belongsTo' => 'associate',
        'belongsToMany' => 'attach',
    ];

    protected $baseModel, $Data, $relPath, $relType;
    protected $relClass;
    protected $model, $method, $attribute;

    public function __construct($baseModel, $data, $relPath, $relType, $relClass = null)
    {
        $this->baseModel = $baseModel;
        $this->Data = $data;
        $this->relPath = $relPath;
        $this->relType = $relType;
        $this->relClass = $relClass;
        $this->setUp();
        return $this;
    }

    private function setUp(){
        $this->setModel();
        $this->setMethod();
        $this->setAttribute();
    }

    private function setModel(){
        $baseModel = $this->baseModel;
        $relPath = $this->relPath;
        $this->model = array_reduce(explode(".",$relPath),function($base,$current){
            return $base->$current();
        },$baseModel);
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
        $model = $this->model;
        $method = $this->method;
        $attribute = $this->attribute;
        $model->$method($attribute);
        return $model;
    }


}