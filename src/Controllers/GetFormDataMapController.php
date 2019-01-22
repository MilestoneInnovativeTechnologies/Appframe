<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFormDataMapController extends Controller
{

    public function index(){
        $data = $this->bag->r('data_id'); $form = $this->bag->r('form_id');
        $Data = Helper::Help('GetFormDataMap',$form,compact('data'));
        if($Data) $this->bag->store('FormDataMap',$form,$Data);
    }

}