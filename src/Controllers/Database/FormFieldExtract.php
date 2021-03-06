<?php

namespace Milestone\Appframe\Controllers\Database;

use Milestone\Appframe\Bag;
use Milestone\Appframe\Model\ResourceRelation;
use Illuminate\Support\Arr;

class FormFieldExtract
{
    protected $bag;
    protected $formFields, $formDefaults, $resource;
    public $resourceModel, $fields, $relationGrouped;
    private $RelationCache = [];

    public function __construct($Form)
    {
        $this->bag = resolve(Bag::class);
        $this->resource = $Form->Resource;
        $this->formFields = $this->getExtractFields($Form->Fields);
        $this->formDefaults = $this->getExtractDefaults($Form->Defaults);
    }

    public function process($Record = null){
        $this->initialize($Record);
        return $this;
    }

    private function getExtractFields($Fields){
        return $Fields->mapWithKeys(function($Field){
            return [$Field->name => $this->getFieldAttributes($Field)];
        });
    }

    private function getExtractDefaults($Fields){
        return $Fields->mapWithKeys(function($Field){
            return [$Field->name => [
                'value' => $Field->value,
                'path' => $this->getFieldPath($Field,'method',false),
                'attribute' => $Field->attribute,
                'type' => $this->getFieldPath($Field,'type'),
                'class' => $this->getFieldPath($Field,'class'),
            ]];
        });
    }

    private function getFieldAttributes($Field){
        $Attrs = [];
        $Attrs['value'] = $this->getInputValue($Field->name);
        $Attrs['path'] = $this->getFieldPath($Field->Data,'method',false);
        $Attrs['attribute'] = $Field->Data->attribute;
        $Attrs['type'] = $this->getFieldPath($Field->Data,'type');
        $Attrs['class'] = $this->getFieldPath($Field->Data,'class');
        return $Attrs;
    }

    private function getInputValue($name){
        return $this->bag->req('data.' . $name);
    }

    private function getFieldPath($data,$item,$lastItemOnly = true){
        $key = [];
        foreach (['relation','nest_relation1','nest_relation2','nest_relation3'] as $rel){
            if($data->$rel) $key[] = $this->getRelationDetails($data->$rel)[$item];
            else break;
        }
        return empty($key) ? '' : (($lastItemOnly) ? last($key) : implode('.',$key));
    }

    private function getRelationDetails($relation){
        if(array_key_exists($relation,$this->RelationCache)) return $this->RelationCache[$relation];
        return $this->storeRelation($relation);
    }

    private function storeRelation($relation){
        $ResRelation = ResourceRelation::with('Resource')->find($relation);
        $class = $this->getResourceClass($ResRelation->Resource);
        return $this->RelationCache[$relation] = ['class' => $class,'method' => $ResRelation->method,'type' => $ResRelation->type];
    }

    private function getResourceClass($resource){
        return implode("\\",[$resource->namespace,$resource->name]);
    }

    private function getClassModel($Class,$Record){
        return ($Record) ? (new $Class)->find($Record) : new $Class;
    }

    private function initialize($Record){
        $this->resourceModel = $this->getClassModel($this->getResourceClass($this->resource),$Record);
        $this->fields = $this->formFields->union($this->formDefaults);
        $this->relationGrouped = $this->getRelationGroupedFields();
    }

    private function getRelationGroupedFields(){
        return $this->groupByPath($this->fields);
    }

    private function groupByPath($Fields){
        return $Fields->groupBy->path->map(function($fields){
            $field = $fields[0];
            $data = Arr::only($field,['path','type','class']);
            $data['data'] = $fields->map(function($field){
                return Arr::only($field,['attribute','value']);
            })->toArray();
            return $data;
        });
    }

}