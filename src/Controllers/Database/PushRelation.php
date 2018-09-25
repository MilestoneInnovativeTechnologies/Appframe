<?php

namespace Milestone\Appframe\Controllers\Database;

class PushRelation
{
    protected $baseModel, $path, $type, $class;
    protected $model, $method, $data;
    private $typeMethod = [
        'hasOne' => 'save',
        'hasMany' => 'saveMany',
        'belongsTo' => 'associate',
        'belongsToMany' => 'sync',
    ];
    private $many2ManyMethods = ['associate', 'sync', 'attach'];
    private $one2OneMethods = ['save'];
    private $one2ManyMethods = ['saveMany'];

    public function __construct($baseModel, $details)
    {
        $this->baseModel = $baseModel;
        $this->setDetails($details);
        $this->initiate();
    }

    private function setDetails($details){
        $this->path = $details['path'];
        $this->type = $details['type'];
        $this->class = $details['class'];
        $this->data = $details['data'];
    }

    private function initiate(){
        $this->setModel();
        $this->setMethod();
        $this->modifyData();
    }

    public static function save($model, $data){
        return (new self($model,$data))->push();
    }

    public function push(){
        $model = $this->model;
        $method = $this->method;
        $data = $this->data;
        return $model->$method($data);
    }

    private function setModel(){
        $base = $this->baseModel;
        $Relations = explode('.', $this->path);
        $this->model = array_reduce($Relations,function($base,$method){
            return $base->$method();
        },$base);
    }

    private function setMethod($method = null){
        $this->method = $method ?: $this->typeMethod[$this->type];
    }

    private function modifyData(){
        $method = $this->method;
        $this->data = $this->getMethodData($method,$this->data);
    }

    private function getMethodData($method,$data){
        return (in_array($method,$this->many2ManyMethods))
            ? $this->getMany2Data($data)
            : ((in_array($method,$this->one2OneMethods))
                ? $this->getOne2OneData($data)
                : $this->getOne2ManyData($data));
    }

    private function getMany2Data($data){
        $value = [];
        foreach($data as $key => $saveData){
            if(array_key_exists("",$saveData)) $value[$saveData[""]] = array_except($saveData,"");
            else $value[$key] = $saveData;
        }
        return $value;
    }

    private function getOne2OneData($data){
        $relateModel = $this->getRelateModel();
        return $this->fillModelWithData($relateModel,array_shift($data));
    }

    private function getOne2ManyData($data){
        return array_map(function($data1){
            return $this->fillModelWithData($this->getRelateModel(),$data1);
        },array_values($data));
    }

    private function getRelateModel(){
        $class = $this->class;
        return new $class;
    }

    private function fillModelWithData($relateModel,$data){
        return $relateModel->forceFill($data);
    }

}