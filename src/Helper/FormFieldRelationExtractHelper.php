<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceForm;

class FormFieldRelationExtractHelper
{
    private $id, $form, $base, $fields, $data = [];
    public $input, $collection = false, $relations;

    public function __construct($id)
    {
        $this->id = $id;
        $this->form = $form = ResourceForm::with(['Resource','Defaults','Fields.Data','Collections.Relation'])->find($id);
        $this->base = $base = $this->getResourceClass($form->Resource);
        $this->fields = $fields = collect($form->Defaults->toArray())->concat($this->getMergeFormFields($form->Fields));
        $this->relations = Helper::Help('FieldRelationExtract',$fields,[ 'base'=> $base ]);
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
        $this->setFieldData();
        $this->attachData();
        if($this->form->Collections->isNotEmpty()) $this->handleCollections($this->form->Collections);
        return $this->relations;
    }

    private function setFieldData(){
        $this->fields->each(function($field){
            $id = $this->relId($field);
            $this->setData($id,$field['attribute'],$field['name'],$field['value']);
        });
    }

    private function setData($id,$attribute,$name,$value){
        if(!array_key_exists($id,$this->data)) $this->data[$id] = [];
        if($this->collection)
            foreach($this->input as $key => $input)
                $this->data[$id][$key][$attribute] = $value ?: $input[$name];
        else
            $this->data[$id][0][$attribute] = $value ?: $this->input[$name];
    }

    private function attachData(){
        foreach($this->data as $id => $data){
            if(!array_key_exists($id,$this->relations)) continue;
            if(!array_key_exists('data',$this->relations[$id])) $this->relations[$id]['data'] = [];
            foreach($data as $key => $value)
                $this->relations[$id]['data'][$key] = $value;
        }
    }

    private function relId($field){
        return collect($field)->only(['relation','nest_relation1','nest_relation2','nest_relation3','nest_relation4','nest_relation5'])
            ->filter()->map(function($item){ return (is_array($item) || is_object($item)) ? $item['id'] : $item; })
            ->implode('-');
    }

    private function handleCollections($collections){
        foreach($collections as $no => $collection){
            $method = $collection->Relation->method; $name = snake_case($method); $type = $collection->Relation->type;
            $input = $this->input[$name];
            $relations = Helper::Help('FormFieldRelationExtract', $collection->collection_form, [ 'input' => $input, 'collection' => true ]);
            $relations[""]['method'] = $relations[""]['path'] = $method; $relations[""]['type'] = $type; $this->relations['_'.$no] = $relations[""]; unset($relations[""]);
            if(!empty($relations)) foreach($relations as $key => $relation) $this->relations['_'.$no.'-'.$key] = $relation;
        }
    }

}