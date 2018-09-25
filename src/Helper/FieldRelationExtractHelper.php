<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceRelation;

class FieldRelationExtractHelper
{
    private $fields,$relations = [];
    public $base;
    protected $classes = [];

    public function __construct($fields)
    {
        $this->fields = $fields;
        $this->rr = new ResourceRelation;
    }

    public function get(){
        $this->extract();
        return $this->relations;
    }

    private function extract(){
        $base = $this->base;
        $this->fields->each(function($field) use($base){
            list($id,$class,$path,$type,$method) = ['','','','',''];
            if(isset($field['relation']) && !empty($field['relation'])){
                $class = $this->getResourceClass($field['relation']['id']);
                $deepRelations = Helper::Help('DeepRelation',$field);
                $id = implode('-',array_column($deepRelations,'id'));
                $path = Helper::Help('ChainRelation',$deepRelations,['json' => false]);
                $type = last($deepRelations)['type']; $method = last($deepRelations)['method'];
            } else $class = $base;
            $this->addRelation($id,$path,$class,$type,$method);
        });
    }

    private function getResourceClass($relation){
        if(array_key_exists($relation,$this->classes)) return $this->classes[$relation];
        return $this->storeAndGetResourceClass($relation);
    }

    private function storeAndGetResourceClass($relation){
        $Res = $this->rr->find($relation)->Resource;
        return $this->classes[$relation] = ($Res) ? implode("\\",[$Res['namespace'],$Res['name']]) : '';
    }

    private function addRelation($id,$path,$class,$type,$method){
        if(!array_key_exists($id,$this->relations))
            $this->relations[$id] = ['type' => $type,'method' => $method,'class' => $class,'path' => $path];
    }

}