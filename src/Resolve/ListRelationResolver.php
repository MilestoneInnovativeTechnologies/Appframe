<?php

namespace Milestone\Appframe\Resolve;

class ListRelationResolver extends Resolve
{
    public function yes(){
        return true;
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $this->bag->r('relation_id',$this->bag->r('idns')['idn1']);
        $this->bag->r('list_id',$this->bag->r('idns')['idn2']);
        $this->bag->r('record_id',$this->bag->req('id'));
    }

    public function controllers(){
        $Controllers = [];
        if($this->needDetails()) array_push($Controllers,'GetListDetailsController');
        $Controllers[] = 'GetListRelationDataController';
        return $this->namespacedControllers($Controllers);
    }

    private function needDetails(){
        return $this->yes()
            || empty($this->bag->req('update'))
            || !$this->bag->session('List')
            || !array_key_exists($this->bag->r('list_id'),$this->bag->session('List'))
            ;
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}