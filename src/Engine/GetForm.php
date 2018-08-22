<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\Model\ResourceForm;

class GetForm extends Base
{
    /*
     * This engine will be included once all the conditions
     * in this array succeeded
     * The key will be matched against request()->input() to value.
     * If value is plain text, string comparison performs
     * If value starting with @, predefined method check will performs
     * If value starting with !, Not Equal comparison performs
     */
    static $on = [
        'type' => 'Form',
        'item' =>  '@isNotEmpty',
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
        $formId = $this->bag->r('item');
        $form = $this->form($formId); $validations = $this->validations($form)->toArray();
        $this->bag->push('Validation',$formId,$validations);
        $this->bag->store('Form',$formId,$form);
    }

    private function form($formId){
        return ResourceForm::with(['Fields' => function($Q){ $Q->with(['Attributes','Options','Validations']); }])->find($formId);
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