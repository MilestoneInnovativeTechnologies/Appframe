<?php

namespace Milestone\Appframe\Engine;


use Milestone\Appframe\Resource;
use Milestone\Appframe\ResourceRelation;

class InsertRelationData
{
    public $Temp = null;

    protected $Resource = [];
    protected $Model = null;
    protected $Data = [];
    protected $Relations = [];

    public function __construct($Data)
    {
        $this->init($Data);
        $this->Temp = [$this->Resource,$this->Model,$this->Data,$this->Relations];
    }

    static function insert($Data){
        $Class = new self($Data);
        return $Class->Temp;
    }

    private function init($Data){
        $this->fetchResource($Data);
        $this->setModel();
        $this->extractData($Data);
        $this->extractRelations($Data);
    }

    private function fetchResource($Data){
        $this->Resource = Resource::find(array_keys($Data)[0]);
    }

    private function setModel(){
        $resource = $this->Resource;
        $class = implode("\\",[$resource->namespace,$resource->name]);
        $this->Model = new $class;
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