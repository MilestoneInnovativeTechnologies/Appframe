<?php

namespace Milestone\Appframe\Engine;


use Milestone\Appframe\Resource;
use Milestone\Appframe\ResourceRelation;

class InsertRelationData
{
    public $Temp = null;

    protected $Resources = [];
    protected $Data = [];
    protected $Relations = [];

    public function __construct($Data)
    {
        $this->init($Data);
    }

    static function insert($Data){
        $Class = new self($Data);
        return $Class->Temp;
    }

    private function init($Data){
        $resources = $this->getResources($Data);
        $this->fetchResources($resources);
        $this->extractData($Data);
        $this->extractRelations($Data);
        $this->Temp = $this->Data;
    }

    private function getResources($Data){
        return $this->getIntKeys($Data);
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

    private function fetchResources($resources){
        $this->Resources = Resource::find($resources)->keyBy('id');
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

}