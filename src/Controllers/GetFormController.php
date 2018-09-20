<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFormController extends Controller
{

    public function index(){
        $formId = $this->bag->r('form_id');
        $form = Helper::Help('Form',$formId);
        $validations = Helper::Help('Validation',$form);
        $this->bag->push('Validation',$formId,$validations);
        $this->bag->store('Form',$formId,$form);
    }

}