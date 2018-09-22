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
        $form = $this->bag->r('idns')['idn1']; $this->bag->r('form_id',$form);
        $data = $this->bag->r('idns')['idn2']; $this->bag->r('data_id',$data);
        $this->bag->r('record',$this->bag->req('id'));
        $this->bag->r('update',$this->bag->req('record'));
    }

    public function controllers(){
        $Controllers = []; if($this->yes()) array_push($Controllers,'GetFormController','GetDataDetailsController');
        if($this->bag->r('update')) array_push($Controllers,'ValidationController','FormSubmitController','FormSubmitDataController');
        else array_push($Controllers,'GetFormDataController');
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }
}