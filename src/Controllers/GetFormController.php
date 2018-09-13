<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFormController extends Controller
{

    public function index(){
        $formId = $this->bag->r('form');
        $form = Helper::Helper('Form',$formId);
        $validations = Helper::Helper('Validation',$form);
        $this->bag->push('Validation',$formId,$validations);
        $this->bag->store('Form',$formId,$form);
    }

}