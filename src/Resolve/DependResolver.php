<?php

namespace Milestone\Appframe\Resolve;

class DependResolver extends Resolve
{
    public function yes(){
        return false;
    }

    public function idns(){
        return [];
    }

    public function prepare(){
        $this->bag->r('field_id',$this->bag->req('form_field'));
        $this->bag->r('field_name',$this->bag->req('field_name'));
        $this->bag->r('data',$this->bag->req('data'));
        $this->bag->r('form_id',$this->bag->req('form'));
    }

    public function controllers(){
        $Controllers = ['GetDependFieldDataController'];
        return $this->namespacedControllers($Controllers);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}