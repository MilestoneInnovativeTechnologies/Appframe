<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceForm;

class FormSubmitController extends Controller
{

    public function index(){
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('form'); $update = $this->bag->r('update');
        $Form = ResourceForm::with('Resource','Defaults','Fields.Data')->find($form);
        $FieldExtractClass = (new Database\FormFieldExtract($Form))->process($update);
        $RelationGrouped = $FieldExtractClass->relationGrouped;
        $this->bag->r('submit_relations',$RelationGrouped->keys()->filter()->values()->toArray());
        $Submit = new Database\Push($RelationGrouped->toArray(),$FieldExtractClass->resourceModel);
        $this->bag->store('FormSubmit',$form,!!$Submit); $this->bag->r('submit_model',$Submit->Model);
    }

}