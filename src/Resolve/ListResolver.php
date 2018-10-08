<?php

namespace Milestone\Appframe\Resolve;

class ListResolver extends Resolve
{
    public function yes(){
        return (
            $this->bag->req('update') === null &&
            $this->bag->req('get') === null &&
            $this->bag->req('page') === null &&
            $this->bag->req('term') === null &&
            true
        );
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('list_id',$idn1);
        $this->bag->r('update',!empty($this->bag->req('update')));
        $this->bag->r('page',$this->bag->req('page') ?: 1);
        $this->bag->r('get',$this->bag->req('get'));
        $this->bag->r('term',$this->bag->req('term'));
    }

    public function controllers(){
        $Controllers = [$this->bag->req('page') ? 'GetListPageItemsController' : ($this->bag->req('term') ? 'GetListSearchItemsController' : 'GetListController')];
        if($this->yes()) array_unshift($Controllers,'GetListDetailsController');
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

}