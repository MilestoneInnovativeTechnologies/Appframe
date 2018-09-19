<?php

namespace Milestone\Appframe\Resolve;

class ListResolver extends Resolve
{
    public function yes(){
        return empty($this->bag->req('update'));
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('list_id',$idn1);
        $this->bag->r('update',!empty($this->bag->req('update')));
    }

    public function controllers(){
        $Controllers = ['GetListController'];
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

}