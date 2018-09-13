<?php

namespace Milestone\Appframe\Controllers;

class FormSubmitDataController extends Controller
{

    public function index(){
        if(!$this->bag->r('submit_model')) return;
        $Data = ($this->bag->r('submit_relations') && !empty($this->bag->r('submit_relations')))
            ? ($this->bag->r('submit_model'))->load($this->bag->r('submit_relations'))
            : $this->bag->r('submit_model');
        $this->bag->store('FormSubmitData',$this->bag->r('form'),$Data);
    }

}