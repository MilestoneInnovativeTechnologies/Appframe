<?php

namespace Milestone\Appframe\Resolve;

class ListRelationResolver extends Resolve
{
    public function yes(){
        return $this->bag->req('data') === null;
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $this->bag->r('relation_id',$this->bag->r('idns')['idn1']);
        $this->bag->r('list_id',$this->bag->r('idns')['idn2']);
        $this->bag->r('record_id',$this->bag->req('id'));
        $this->bag->r('get',$this->bag->req('get'));
    }

    public function controllers(){
        $Controllers = [($this->bag->req('get') === null) ? 'GetListRelationDataController' : 'GetListController'];
        if($this->needDetails()) array_unshift($Controllers,'GetListDetailsController');
        return $this->namespacedControllers($Controllers);
    }

    private function needDetails(){
        return $this->yes()
            || !$this->bag->session('List')
            || !array_key_exists($this->bag->r('list_id'),$this->bag->session('List'))
            ;
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}