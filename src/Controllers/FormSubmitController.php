<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\ResourceForm;

class FormSubmitController extends Controller
{

    public function index(){
        $Validator = $this->bag->get('Validator');
        if($Validator === NULL || !$Validator->fails())
            $this->SubmitForm();
    }

    private function SubmitForm(){
        $form = $this->bag->r('form_id'); $update = $this->bag->r('update'); $data = $this->bag->r('data');
        $Model = $this->getFormResourceModel($form,$update);
        $Data = Helper::Help('FormFieldRelationExtract',$form,[ 'input' => $data ]);
        $this->bag->r('submit_relations',array_filter(array_column($Data,'path')));
        $Submit = new Database\Push($Data,$Model);
        $this->bag->store('FormSubmit',$form,!!$Submit); $this->bag->r('submit_model',$Submit->Model);
    }

    private function getFormResourceModel($form,$update){
        $Res = ResourceForm::find($form)->Resource;
        $Class = implode("\\",[$Res->namespace,$Res->name]);
        return ($update) ? (new $Class)->find($update) : new $Class;
    }

}