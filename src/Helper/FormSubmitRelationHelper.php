<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceForm;
use Milestone\Appframe\Model\ResourceRelation;

class FormSubmitRelationHelper
{
    private $form_id, $form, $fields, $relation_cache = [];
    public $input = [], $id, $collection = false, $skip = null;
    protected $relations = [];

    public function __construct($form_id)
    {
        $this->form_id = $form_id;
        $this->form = $form = ResourceForm::with(['Resource','Defaults','Fields.Data','Collections.Relation'])->find($form_id);
        $this->relations = [$this->getProperties(null,$form->Resource)];
    }

    private function setFields(){
        $form = $this->form; $skip = $this->skip;
        $fields = collect($form->Defaults->toArray())->concat($this->getMergeFormFields($form->Fields));
        $this->fields = ($skip) ? $fields->reject(function($field) use($skip){ $form_field = $field['form_field']; return in_array($form_field,(array) $skip); }) : $fields;
    }

    private function getMergeFormFields($fields){
        return $fields->map(function($field){
            return collect($field->Data)->merge(['name' => $field->name, 'value' => null]);
        });
    }

    private function getProperties($relation,$resource = null){
        $set = $this->getDefaultPropertySet();
        if($relation) $set = array_merge($set,$this->getRelationProperties($relation));
        elseif($resource) $set = array_merge($set,$this->getResourceProperties($resource));
        return $set;
    }

    private function getDefaultPropertySet(){
        $set = array_fill_keys([
            'id','class','type','method','records'
        ],null);
        $set['records'] = [
            [
                'data' => [],
                'relations' => []
            ]
        ];
        return $set;
    }

    private function getRelationProperties($relation){
        if(array_key_exists($relation,$this->relation_cache)) return $this->relation_cache[$relation];
        $Relation = $this->getRelationObject($relation);
        $type = $Relation->type;
        $method = $Relation->method;
        $class = $this->getResourceClass($Relation->Resource);
        return $this->relation_cache[$relation] = compact('type','method','class');
    }

    private function getResourceProperties($resource){
        $Resource = $this->getResourceObject($resource);
        $class = $this->getResourceClass($Resource);
        return compact('class');
    }

    private function getRelationObject($relation){
        return (is_object($relation))
            ? $relation->load('Resource')
            : ResourceRelation::with('Resource')->find($relation);
    }

    private function getResourceObject($resource){
        return (is_object($resource))
            ? $resource
            : Resource::find($resource);
    }
    private function getResourceClass($res){
        return implode("\\",[$res->namespace,$res->name]);
    }

    public function get(){
        $this->setFields(); if($this->id) $this->relations[0]['id'] = $this->id;
        $this->setBaseRecords();
        $this->handleCollections();
        return $this->relations;
    }

    private function setBaseRecords(){
        $input = ($this->collection) ? $this->input : [$this->input];
        $this->relations[0]['records'] = $this->getRecords($input,$this->fields);
    }

    private function getRecords($inputs,$fields){
        $records = [];
        if(empty($inputs)) return [[ 'data' => [], 'relations' => [] ]];
        foreach($inputs as $record_id => $input){
            $records[$record_id] = [ 'data' => [], 'relations' => [] ]; $relation_details = [];
            foreach ($fields as $field){
                $active_record = &$records[$record_id];
                if(!$field['relation']){
                    $value = $field['value'] ? $this->getFormDefaultValue($field['value']) : (array_key_exists($field['name'],$input) ? $input[$field['name']] : null);
                    $active_record['data'][$field['attribute']] = $value;
                } else {
                    foreach(['relation','nest_relation1','nest_relation2','nest_relation3'] as $deep => $rel){
                        if($field[$rel]){
                            if(!array_key_exists($deep,$relation_details)) $relation_details[$deep] = [];
                            $relation_id = (is_object($field[$rel]) || is_array($field[$rel])) ? $field[$rel]['id'] : $field[$rel];
                            if(!array_key_exists($relation_id,$relation_details[$deep])){
                                $properties = $this->getProperties($relation_id);
                                $relation_details[$deep][$relation_id] = $relation_index = array_push($active_record['relations'],$properties) - 1;
                            } else $relation_index = $relation_details[$deep][$relation_id];
                            $active_record = &$active_record['relations'][$relation_index]['records'];
                        } else {
                            $values = $field['value'] ? $this->getFormDefaultValue($field['value']) : (array_key_exists($field['name'],$input) ? $input[$field['name']] : null);
                            $active_record[0]['data'][$field['attribute']] = $values;
                            break;
                        }
                    }
                }
            }
        }
        return $records;
    }

    private function getFormDefaultValue($value){
        return (is_array($value))
            ? $value
            : ((mb_stripos($value,",") !== false)
                ? array_map(function($val){ return trim($val); },explode(",",$value))
                : trim($value));
    }

    private function getInputValue($name){
        return (array_key_exists($name,$this->input)) ? $this->input[$name] : null;
    }

    private function handleCollections(){
        if($this->hasCollection())
            $this->setCollectionRelations($this->form->Collections);
    }

    private function hasCollection(){
        $collections = $this->form->Collections;
        return $collections && $collections->isNotEmpty();
    }

    private function setCollectionRelations($Collections){
        $relations = &$this->relations[0]['records'][0]['relations'];
        foreach($Collections as $Collection){
            $relation_index = array_push($relations,$this->getProperties($Collection->relation))-1;
            $method = $Collection->Relation->method;
            $input = $this->getInputValue(snake_case($method)); $collection = true; $skip = $Collection->foreign_field;
            $collection_relations = Helper::Help('FormSubmitRelation',$Collection->collection_form,compact('input','collection','skip'));
            $relations[$relation_index]['records'] = $collection_relations[0]['records'];
        }
    }

}
