<?php

namespace Milestone\Appframe\Resolve;

class AddRelationResolver extends Resolve
{
    public function yes(){
        return empty($this->bag->req('data'));
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $idn2 = $this->bag->r('idns')['idn2']; $this->bag->r('form_id',$idn2);
    }

    public function controllers(){
        $Controllers = [];
        if($this->isFormSubmit()) array_push($Controllers,'ValidationController','RelationFormSubmitController','FormSubmitDataController');
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