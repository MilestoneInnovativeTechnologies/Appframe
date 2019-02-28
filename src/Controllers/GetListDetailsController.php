<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Arr;
use Milestone\Appframe\Helper\Helper;

class GetListDetailsController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $List = Helper::Help('List',$id);

        $List['orm']['Scopes'] = $List['orm']['Scopes'] ? $List['orm']['Scopes']->toArray() : null;
        $List['layout'] = $List['layout'] ?: null;
        $List['count'] = Helper::Help('GetOrm',$List['orm']['Class'],Arr::except($List['orm'],'Class'))->count();
        $this->bag->push('List',$id,$List);

        $this->bag->store('ListData',$id,Arr::except($List,['orm','layout']));
        $this->bag->store('ListLayout',$id,$List['layout']);
    }

}