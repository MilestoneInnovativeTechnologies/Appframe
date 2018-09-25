<?php

namespace Milestone\Appframe\Resolve;

class OptionResolver extends Resolve
{
    public function yes(){
        return false;
    }

    public function idns(){
        return [];
    }

    public function prepare(){
        $this->bag->r('option_id',$this->bag->req('id'));
    }

    public function controllers(){
        $Controllers = ['GetFieldOptionController'];
        return $this->namespacedControllers($Controllers);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}