<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceForm;

class FormSubmitController extends Controller
{

    public function index(){
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('item');
        $Form = ResourceForm::with('Resource','Defaults','Fields.Data')->find($form);
        $Data = (new Database\BindData($Form->Resource->id, $Form))->push();
        $id = ($Data && $Data->id) ? $Data->id : '';
        $this->bag->store('Data',$id,$Data);
        $this->bag->store('SubmitForm',$form,(bool) $Data);
    }

}