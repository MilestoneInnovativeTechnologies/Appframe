<?php

namespace Milestone\Appframe\Resolve;

class ManageRelationResolver extends Resolve
{
    public function yes(){
        return $this->bag->req('update') === null && $this->bag->req('data') === null;
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $idn2 = $this->bag->r('idns')['idn2']; $this->bag->r('list_id',$idn2);
        $idn1 = $this->bag->r('idns')['idn1']; $this->bag->r('relation_id',$idn1);
        $this->bag->r('record_id',$this->bag->req('id')); $this->bag->r('relations',$this->bag->req('data'));
    }

    public function controllers(){
        $Controllers = [];
        if($this->yes()) array_push($Controllers,'GetListDetailsController');
        elseif($this->bag->r('relations') !== null) array_push($Controllers,'UpdateRelationController','ListRelationUpdatedController');
        array_push($Controllers,'GetListController','GetListRelationDataController');
        return $this->namespacedControllers($Controllers);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }

}