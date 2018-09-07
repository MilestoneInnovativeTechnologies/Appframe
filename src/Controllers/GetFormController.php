<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceForm;

class GetFormController extends Controller
{

    public function index(){
        $formId = $this->bag->r('item');
        $form = $this->form($formId); $validations = $this->validations($form)->toArray();
        $this->bag->push('Validation',$formId,$validations);
        $this->bag->store('Form',$formId,$form);
    }

    private function form($formId){
        return ResourceForm::with(['Fields' => function($Q){ $Q->with(['Attributes','Options','Validations']); },'Layout'])->find($formId);
    }

    private function validations($form){
        return $form->Fields->mapWithKeys(function($field){ return $this->validation_data($field); });
    }

    private function validation_data($field){
        $name = $field->name;
        $prop = $field->Validations->map(function($validation){
            return collect($validation)->only(['rule','message','arg1','arg2','arg3','arg4','arg5'])->filter();
        })->toArray();
        return [$name => $prop];
    }

}