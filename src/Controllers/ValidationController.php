<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{

    public function index(){
        $formId = $this->bag->r('item');
        $Validator = ($this->isValidationExists($formId)) ? $this->getValidator($formId) : NULL;
        $this->bag->keep('Validator',$Validator);
        if($Validator !== NULL){
            $status = !$Validator->fails(); $errors = $Validator->errors();
            $this->bag->store('Validation',$formId,compact('status','errors'));
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
        return Validator::make($this->bag->req('data'),$Rules,$Messages);
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
            $Args = implode(',',$this->getArgumentsArray($Ary));
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

    private function getArgumentsArray($Ary){
        return array_map(function($arg){
            return (mb_substr($arg,0,1) !== "-") ? $arg : $this->getDynamicRuleArg($arg);
        },array_filter(array_only($Ary,['arg1','arg2','arg3','arg4','arg5'])));
    }

    private function getDynamicRuleArg($arg){
        list($Item,$Name) = explode(':',mb_substr($arg,1));
        return $this->bag->$Item($Name);
    }

}