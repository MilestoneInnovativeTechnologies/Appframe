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
        $this->bag->r('list',$this->bag->req('list'));
        $this->bag->r('record',$this->bag->req('id'));
    }

    public function controllers(){
        $Controllers = [];
        if($this->yes()) $Controllers[] = 'GetFormController';
        $Controllers[] = 'GetFormDataController';
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }
}