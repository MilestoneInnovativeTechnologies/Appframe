<?php

namespace Milestone\Appframe\Resolve;

class Form extends Resolve
{
    public function yes(){
        return empty($this->bag->req('data'));
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('item',$idn1);
    }

    public function controllers(){
        $Controllers = [];
        if($this->isGetFormController()) $Controllers[] = 'GetFormController';
        if($this->isValidationController()) $Controllers[] = 'ValidationController';
        if($this->isFormSubmitController()) $Controllers[] = 'FormSubmitController';
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

    private function isGetFormController(){
        return empty($this->bag->req('data'));
    }

    private function isValidationController(){
        return !empty($this->bag->req('data'));
    }

    private function isFormSubmitController(){
        return !empty($this->bag->req('data'));
    }
}