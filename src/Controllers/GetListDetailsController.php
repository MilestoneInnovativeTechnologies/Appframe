<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListDetailsController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $List = Helper::Help('List',$id);

        $List['orm']['Scopes'] = $List['orm']['Scopes'] ? $List['orm']['Scopes']->toArray() : null;
        $List['layout'] = $List['layout'] ?: null;
        $this->bag->push('List',$id,$List);

        $this->bag->store('ListData',$id,array_except($List,['orm','layout']));
        $this->bag->store('ListLayout',$id,$List['layout']);
    }

}