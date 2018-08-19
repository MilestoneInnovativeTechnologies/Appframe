<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\Engine\Database\BindData;
use Milestone\Appframe\ResourceForm;

class FormSubmit extends Base
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
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('item.item');
        $Form = ResourceForm::with('Resource','Defaults','Fields.Data')->find($form);
        $RelationData = $this->getRelationData($Form);
        $Data = (new BindData($RelationData))->push();
        $id = ($Data && $Data->id) ? $Data->id : '';
        $this->bag->store('Data',$id,$Data);
        $this->bag->store('SubmitForm',$form,(bool) $Data);
    }

    private function store($data){
        $this->bag->store('Submit','LOOK',$data);
    }

    private function getRelationData($Form){
        $Resource = $Form->Resource->id; $Data[$Resource] = [];
        $Form->Fields->each(function($Field) use($Resource, &$Data) {
            if(!$Field->Data) return;
            $key = 'data.' . $Field->name; $value = $this->bag->r($key); $StoreTo = &$Data[$Resource];
            foreach (['relation','relation1','relation2','relation3'] as $Rel) {
                if($Field->Data->$Rel) {
                    $NRelation = $Field->Data->$Rel;
                    if(!array_key_exists($NRelation,$StoreTo)) $StoreTo[$NRelation] = [];
                    $StoreTo = &$StoreTo[$NRelation];
                } else break;
            }
            if($Field->Data->attribute) $StoreTo[$Field->Data->attribute] = $value;
            else $StoreTo[] = $value;
        });
        $Form->Defaults->each(function ($Default) use($Resource, &$Data){
            $value = $Default->value; $StoreTo = &$Data[$Resource];
            foreach (['relation','relation1','relation2','relation3'] as $Rel) {
                if($Default->$Rel) {
                    $NRelation = $Default->$Rel;
                    if(!array_key_exists($NRelation,$StoreTo)) $StoreTo[$NRelation] = [];
                    $StoreTo = &$StoreTo[$NRelation];
                }
            }
            if($Default->attribute) $StoreTo[$Default->attribute] = $value;
            else $StoreTo[] = $value;
        });
        return $Data;
    }
}