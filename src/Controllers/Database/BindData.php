<?php

namespace Milestone\Appframe\Controllers\Database;

class BindData extends DatabaseBind
{

    protected $Result;

    public function __construct($Data, $DataId = null)
    {
        parent::__construct($Data, $DataId);
    }

    public function push(){
        $this->insertData($this->DataInit);
        return $this->Result;
    }

    private function getResourceData($resId){
        return $this->Data[$resId];
    }

    private function insertData($resId){
        $this->insertNativeData($resId);
        if($this->hasRelationData($resId)){
            foreach($this->getRelationData($resId) as $relateResId => $relateDetails){
                $this->insertChildData($relateResId,$relateDetails);
            }
        }

    }

    private function insertNativeData($resId){
        $data = $this->getResourceData($resId);
        foreach ($data as $attribute => $value)
            $this->Model->$attribute = $value;
        $this->Model->save();
        $this->Result = $this->Model;
    }

    private function hasRelationData($resId){
        $relations = $this->Relations;
        return array_key_exists($resId,$relations) && !empty($relations[$resId]);
    }

    private function getRelationData($resId){
        return $this->Relations[$resId];
    }

    private function insertChildData($resId,$relationDetails,$parentRelates = []){
        $baseModel = $this->relationModel($this->Model,$parentRelates);
        $Data = $this->Data[$resId];
        $relMethod = $relationDetails['method'];
        $relType = $relationDetails['type'];
        $relClass = $this->getResModelClass($resId);
        $this->Result = (new RelationBind($baseModel,$Data,$relMethod,$relType,$relClass))->go();
    }

    private function relationModel($model,$relations){
        if(empty($relations)) return $model;
        foreach($this->getRelationMethods($relations) as $method)
            $model = $model->$method();
        return $model;
    }

    private function getRelationMethods($relations){
        $methods = []; $parent = $this->DataInit;
        foreach($relations as $k => $resource){
            $methods[$k] = $this->getRelationDetails($parent,$resource)['method'];
        }
        return $methods;
    }

    private function getRelationDetails($resource1,$resource2){
        return $this->Relations[$resource1][$resource2];
    }

}