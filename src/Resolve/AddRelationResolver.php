<?php

namespace Milestone\Appframe\Resolve;

use Illuminate\Support\Arr;

class AddRelationResolver extends Resolve
{
    public function yes(){
        return empty($this->bag->req('data'));
    }

    public function idns(){
        return ['idn1','idn2','idn3'];
    }

    public function prepare(){
        $idns = $this->bag->r('idns');
        $this->bag->r('relation_id',Arr::get($idns,'idn1'));
        $this->bag->r('form_id',Arr::get($idns,'idn2'));
        $this->bag->r('field_id',Arr::get($idns,'idn3'));
        $this->bag->r('data',$this->bag->req('data'));
        $this->bag->r('record',$this->bag->req('record'));
    }

    public function controllers(){
        $Controllers = [];
        if($this->isFormSubmit()) array_push($Controllers,'ValidationController','AddRelationSubmitController','FormSubmitDataController');
        else array_push($Controllers,'GetFormController');
        return $this->namespacedControllers($Controllers);
    }

    private function isFormSubmit(){
        return !empty($this->bag->req('data'));
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }

}
