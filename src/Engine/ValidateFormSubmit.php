<?php

namespace Milestone\Appframe\Engine;

use Illuminate\Support\Facades\Validator;
use Milestone\Appframe\ResourceForm;

class ValidateFormSubmit extends Base
{
    /*
     * This engine will be included once all the conditions
     * in this array succeeded
     * The key will be matched against request()->input() to value.
     * If value is plain text, string comparison performs
     * If value starting with @, predefined method check will performs
     *
     */
    static $on = [
        'item.type' => 'Form',
        'item.item' =>  '@isNotEmpty',
        'item.action' =>  'Submit',
    ];

    /*
     * The things to be return with response are needed to be store into bag
     * $this->bag->store(name,id,data)
     * where name will be the root property name in response having data indexed by id
     * The things to keep in bag are kept by calling
     * $this->bag->keep(name,data)
     * To get the kept data out of bag, call
     * $this->bag->get(name)
     */
    public function boot(){
        $formId = $this->bag->r('item.item');
        $Validator = ($this->isValidationExists($formId)) ? $this->getValidator($formId) : NULL;
        $this->bag->keep('Validator',$Validator);
        if($Validator !== NULL){
            $this->bag->store('Validation','status', !$Validator->fails());
            $this->bag->store('Validation','errors', $Validator->errors());
        }
    }

    private function isValidationExists($formId){
        $Validation = $this->bag->session('Validation');
        return ($Validation && array_key_exists($formId,$Validation));
    }

    private function getValidator($formId){
        $ValidateData = $this->getValidationData($formId);
        $Rules = $this->getValidationRules($ValidateData);
        $Messages = $this->getValidationMessages($ValidateData);
        return Validator::make($this->bag->r('data'),$Rules,$Messages);
    }

    private function getValidationData($formId){
        return $this->bag->session('Validation')[$formId];
    }

    private function getValidationRules($ValidateData){
        return collect($ValidateData)->map(function($ValidateCollection){
            return implode('|',$this->getRuleAndArgs($ValidateCollection));
        })->toArray();
    }

    private function getRuleAndArgs($ValidateCollection){
        return array_map(function($Ary){
            $Args = implode(',',array_filter(array_only($Ary,['arg1','arg2','arg3','arg4','arg5'])));
            return ($Args) ? implode(':',[$Ary['rule'],$Args]) : $Ary['rule'];
        },$ValidateCollection);
    }

    private function getValidationMessages($ValidateData){
        return collect($ValidateData)->flatMap(function($ValidateCollection,$Field){
            return collect($ValidateCollection)->mapWithKeys(function($ValidateArray)use($Field){
                return ["$Field.{$ValidateArray['rule']}" => $ValidateArray['message']];
            });
        })->toArray();
    }

}