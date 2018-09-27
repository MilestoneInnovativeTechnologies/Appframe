<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceForm;
use Milestone\Appframe\Model\ResourceRelation;

class FormSubmitRelationHelper
{
    private $form_id, $form, $fields;
    public $input = [], $id, $collection = false;
    protected $relations = [];

    public function __construct($form_id)
    {
        $this->form_id = $form_id;
        $this->form = $form = ResourceForm::with(['Resource','Defaults','Fields.Data','Collections.Relation'])->find($form_id);
        $this->fields = $fields = collect($form->Defaults->toArray())->concat($this->getMergeFormFields($form->Fields));
        $this->relations = [$this->getProperties(null,$form->Resource)];
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
        $Relation = $this->getRelationObject($relation);
        $type = $Relation->type;
        $method = $Relation->method;
        $class = $this->getResourceClass($Relation->Resource);
        return compact('type','method','class');
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

    private function getMergeFormFields($fields){
        return $fields->map(function($field){
            return collect($field->Data)->merge(['name' => $field->name, 'value' => null]);
        });
    }

    public function get(){
        if($this->id) $this->relations[0]['id'] = $this->id;
        $this->setBaseRecords();
        $this->handleCollections();
        return $this->relations;
    }

    private function setBaseRecords(){
        $this->relations[0]['records'] = $this->getRecords($this->fields);
    }

    private function getRecords($fields){
        $records = [[ 'data' => [], 'relations' => [] ]];
        foreach ($fields as $field){
            $base = &$records;
            foreach(['relation','nest_relation1','nest_relation2','nest_relation3'] as $deep => $rel){
                if($field[$rel]) {
                    $relation_id = (is_object($field[$rel]) || is_array($field[$rel])) ? $field[$rel]['id'] : $field[$rel];
                    $properties = $this->getProperties($relation_id);
                    $new_relations_index = array_push($base[0]['relations'],$properties)-1;
                    $base = &$base[0]['relations'][$new_relations_index]['records'];
                } else{
                    $values = $field['value'] ? $this->getFormDefaultValue($field['value']) : $this->getInputValue($field['name']);
                    foreach ((array) $values as $record => $value){
                        $base[$record]['data'][$field['attribute']] = $value;
                        if($records) $base[$record]['relations'] = $base[0]['relations'];
                    }
                    break;
                }
            }
        }
        if($this->collection) unset($records[0]);
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
        if($this->collection) return $this->getCollectionInputValue($name);
        return (array_key_exists($name,$this->input)) ? $this->input[$name] : null;
    }

    private function getCollectionInputValue($name){
        $values = [];
        foreach($this->input as $record => $inputs){
            if(array_key_exists($name,$inputs))
                $values[$record] = $inputs[$name];
        }
        return $values;
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
            $input = $this->getInputValue(snake_case($method)); $collection = true;
            $collection_relations = Helper::Help('FormSubmitRelation',$Collection->collection_form,compact('input','collection'));
            $relations[$relation_index]['records'] = $collection_relations[0]['records'];
        }
    }

}