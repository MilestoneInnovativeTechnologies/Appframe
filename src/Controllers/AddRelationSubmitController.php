<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\ResourceRelation;

class AddRelationSubmitController extends Controller
{

    public function index(){
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('form_id'); $relation_id = $this->bag->r('relation_id'); $record = $this->bag->r('record'); $input = $this->bag->r('data');
        $relation_data = Helper::Help('FormSubmitRelation',$form,compact('input'));
        if(!$this->bag->r('field_id')) $relation_data = $this->wrapRelation($relation_data,$relation_id,$record);
        $this->bag->r('submit_relations',$this->getRelations($relation_data));
        $response = (new Database\Bind($relation_data))->store();
        $this->bag->store('FormSubmit',$form,!!$response); $this->bag->r('submit_model',$response[0]);
    }

    private function getRelations($relation_data){
        $relations = array_column($relation_data[0]['records'],'relations');
        return (empty($relations) || !isset($relations[0]) || empty($relations[0])) ? [] : array_map(function($relation){ return $relation[0]['method']; },$relations);
    }

    private function wrapRelation($relations,$relation_id,$id){
        $relation = ResourceRelation::with(['Owner'])->find($relation_id);
        $set = $this->getDefaultPropertySet();
        $set['id'] = $id; $set['class'] = implode("\\",[$relation->Owner->namespace,$relation->Owner->name]);
        $relations[0]['type'] = $relation->type; $relations[0]['method'] = $relation->method;
        $set['records'][0]['relations'] = $relations;
        return [$set];
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
}
