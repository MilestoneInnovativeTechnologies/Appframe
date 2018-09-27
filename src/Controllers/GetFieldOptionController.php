<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetFieldOptionController extends Controller
{

    public function index(){

        $id = $this->bag->r('option_id'); $latest = $this->bag->session('FieldOptionLatest'); $options = [];
        $latest = ($latest && is_array($latest) && array_key_exists($id,$latest)) ? $latest[$id] : 0;
        extract(Helper::Help('FieldOption',$id,['latest' => $latest]));
        $this->bag->push('FieldOptionLatest',$id,$latest);
        $this->bag->store('FieldOption',$id,$options);
    }

}