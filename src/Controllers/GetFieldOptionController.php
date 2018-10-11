<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFieldOptionController extends Controller
{

    public function index(){

        $id = $this->bag->r('option_id'); $latest = $this->bag->r('latest') ?: 0; $options = [];
        extract(Helper::Help('FieldOption',$id,['latest' => $latest]));
        $this->bag->store('FieldOption',$id,$options);
        if(!empty($options)) $this->bag->store('FieldOptionLatest',$id,$latest);
    }

}