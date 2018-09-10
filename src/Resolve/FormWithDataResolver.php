<?php

namespace Milestone\Appframe\Resolve;

class FormWithDataResolver extends Resolve
{
    public function yes(){
        return !$this->bag->req('data');
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $form = $this->bag->r('idns')['idn1']; $this->bag->r('item',$form); $this->bag->r('form',$form);
        $data = $this->bag->r('idns')['idn2']; $this->bag->r('data',$data);
        $this->bag->r('record',$this->bag->req('id')); $this->bag->r('update',$this->bag->req('record'));
    }

    public function controllers(){
        $Controllers = []; if($this->yes()) $Controllers[] = 'GetFormController';
        if($this->bag->r('update')) array_push($Controllers,'ValidationController','FormSubmitController');
        else $Controllers[] = 'GetFormDataController';
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }
}