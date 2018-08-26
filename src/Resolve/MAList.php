<?php

namespace Milestone\Appframe\Resolve;

class MAList extends Resolve
{
    public function yes(){
        return empty($this->bag->req('update'));
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('item',$idn1);
        $this->bag->r('update',!empty($this->bag->req('update')));
    }

    public function controllers(){
        $Controllers = ['GetListController'];
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

}