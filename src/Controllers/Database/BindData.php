<?php

namespace Milestone\Appframe\Controllers\Database;

class BindData extends DatabaseBind
{

    protected $Result;

    public function __construct($ResId, $Form, $DataId = null)
    {
        parent::__construct($ResId, $Form, $DataId);
    }

    public function push(){
        $this->updateNativeData();
        if($this->hasRelationData()){
            $this->insertRelationsData();
        }
        return $this->Result;
    }

    private function updateNativeData(){
        $data = $this->Data;
        foreach ($data as $attribute => $value)
            $this->Model->$attribute = $value;
        $this->Model->save();
        $this->Result = $this->Model;
    }

    private function hasRelationData(){
        return !empty($this->Relations);
    }

    private function insertRelationsData(){
        $Relations = $this->Relations;
        $baseModel = $this->Model;
        foreach ($Relations as $RelatePath => $Data){
            $RelationDetails = $this->RelationCache[$this->RelationId[$RelatePath]];
            $method = $RelationDetails['method']; $type = $RelationDetails['type']; $class = $RelationDetails['class'];
            (new RelationBind($baseModel,$Data,$method,$type,$class))->go();
        }
    }

}