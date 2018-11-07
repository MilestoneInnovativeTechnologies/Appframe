<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\ResourceForm;

class AddRelationSubmitController extends Controller
{

    public function index(){
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('form_id'); $record = $this->bag->r('record'); $input = $this->bag->r('data');
        $relation_data = Helper::Help('FormSubmitRelation',$form,compact('input'));
        $this->bag->r('submit_relations',$this->getRelations($relation_data));
        $response = (new Database\Bind($relation_data))->store();
        $this->bag->store('FormSubmit',$form,!!$response); $this->bag->r('submit_model',$response[0]);
    }

    private function getRelations($relation_data){
        $relations = array_column($relation_data[0]['records'],'relations');
        return (empty($relations) || !isset($relations[0]) || empty($relations[0])) ? [] : array_map(function($relation){ return $relation[0]['method']; },$relations);
    }
}
