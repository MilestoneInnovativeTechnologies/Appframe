<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetListDetailsController extends Controller
{

    public function index(){
        $id = $this->bag->r('list_id');
        $List = Helper::Help('List',$id);

        $List['orm']['Scopes'] = $List['orm']['Scopes']->toArray(); $List['layout'] = $List['layout']->toArray();
        $this->bag->push('List',$id,$List);

        $this->bag->store('ListData',$id,array_except($List,['orm','layout']));
        $this->bag->store('ListLayout',$id,$List['layout']);
    }

}