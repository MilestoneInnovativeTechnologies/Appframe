<?php

namespace Milestone\Appframe\Helper;

class ValidationHelper
{
    private $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    public function get(){
        return $this->form->Fields->mapWithKeys(function($field){ return $this->validation_data($field); });
    }

    private function validation_data($field){
        $name = $field->name;
        $prop = $field->Validations->map(function($validation){
            return collect($validation)->only(['rule','message','arg1','arg2','arg3','arg4','arg5'])->filter();
        })->toArray();
        return [$name => $prop];
    }

}