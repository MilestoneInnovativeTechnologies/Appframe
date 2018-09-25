<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFieldOptionController extends Controller
{

    public function index(){

        $id = $this->bag->r('option_id');
        $options = Helper::Help('FieldOption',$id);
        $this->bag->store('FieldOption',$id,$options);
    }

}