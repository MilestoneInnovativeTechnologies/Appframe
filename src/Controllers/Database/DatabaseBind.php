<?php

namespace Milestone\Appframe\Controllers\Database;

use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceRelation;

class DatabaseBind
{
    protected $DataInit = null;
    protected $Resources = [];
    protected $Model = null;
    protected $Data = [];
    protected $Relations = [];

    public function __construct($Data,$DataId = null)
    {
        $this->init($Data);
        $this->setModel($DataId);
    }

    private function init($Data){
        $this->fetchResources($Data);
        $this->extractData($Data);
        $this->extractRelations($Data);
    }

    private function fetchResources($Data){
        $this->DataInit = array_keys($Data)[0];
        $resIds = $this->getIntKeys($Data);
        $this->Resources = Resource::find($resIds)->keyBy('id');
    }

    private function setModel($id){
        $class = $this->getResModelClass($this->DataInit);
        $this->Model = ($id) ? (new $class)->find($id) : new $class;
    }

    private function getIntKeys($Array){
        $Keys = [];
        foreach($Array as $Key => $Data){
            if(is_numeric($Key)) $Keys[] = $Key;
            if(is_array($Data) && !isset($Data[0])){
                $Keys = array_merge($Keys,$this->getIntKeys($Data));
            }
        }
        return $Keys;
    }

    private function extractData($Data){
        foreach($Data as $Key => $data){
            $this->extractResourceData($Key,$data);
        }
    }

    private function extractResourceData($Key,$data){
        $this->Data[$Key] = [];
        if(isset($data[0])) $this->Data[$Key] = $data;
        else {
            foreach($data as $attribute => $value){
                if(is_numeric($attribute)) $this->extractResourceData($attribute,$value);
                else $this->Data[$Key][$attribute] = $value;
            }
        }
    }

    private function extractRelations($Data){
        foreach($Data as $resource => $data){
            $this->extractResourceRelations($resource,$data);
        }
    }

    private function extractResourceRelations($resource, $data){
        if(isset($data[0])) return; $this->Relations[$resource] = [];
        foreach($data as $attribute => $value){
            if(is_numeric($attribute) && is_array($value)){
                $this->Relations[$resource][$attribute] = $this->getResourceRelationDetails($resource,$attribute);
                $this->extractResourceRelations($attribute,$value);
            }
        }
    }

    private function getResourceRelationDetails($resource,$resource2){
        $Data = ResourceRelation::where('resource',$resource)->where('relate_resource',$resource2)->first();
        return ['method' => $Data->method,'type' => $Data->type];
    }

    protected function getResModelClass($id){
        $resource = $this->Resources[$id];
        return implode("\\",[$resource->namespace,$resource->name]);
    }
}