<?php

namespace Milestone\Appframe\Resolve;

class GetaddrelationsResolver extends Resolve
{
    public function yes(){
        return false;
    }

    public function idns(){
        return [];
    }

    public function prepare(){
        $this->bag->r('relation_id',$this->bag->req('relation'));
        $this->bag->r('action',$this->bag->req('referer'));
    }

    public function controllers(){
        $Controllers = ['GetAddRelationActionsController'];
        return $this->namespacedControllers($Controllers);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}