<?php

namespace Milestone\Appframe\Resolve;

class FormResolver extends Resolve
{
    public function yes(){
        return empty($this->bag->req('data'));
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('form_id',$idn1);
    }

    public function controllers(){
        $Controllers = [];
        if($this->isFormSubmit()) array_push($Controllers,'ValidationController','FormSubmitController','FormSubmitDataController');
        else array_push($Controllers,'GetFormController');
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

    private function isFormSubmit(){
        return !empty($this->bag->req('data'));
    }

}