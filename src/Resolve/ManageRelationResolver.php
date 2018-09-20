<?php

namespace Milestone\Appframe\Resolve;

class ManageRelationResolver extends Resolve
{
    public function yes(){
        return empty($this->bag->req('update'));;
    }

    public function idns(){
        return ['idn1','idn2'];
    }

    public function prepare(){
        $idn2 = $this->bag->r('idns')['idn2']; $this->bag->r('list_id',$idn2);
    }

    public function controllers(){
        $Controllers = ['GetListController'];
        if($this->yes()) array_unshift($Controllers,'GetListDetailsController');
        return $this->namespacedControllers($Controllers);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }

}