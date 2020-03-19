<?php

namespace Milestone\Appframe\Resolve;

use Illuminate\Support\Facades\Auth;

class ProfileResolver extends Resolve
{
    public function yes(){
        $this->bag->r('idns',['idn1' => 'profile', 'idn2' => 'profile']);
        return !$this->bag->req('data');
    }

    public function idns(){

        return ['idn1','idn2'];
    }

    public function prepare(){
        $this->bag->r('user_id',Auth::id());
        $this->bag->r('user_details',Auth::user());
    }

    public function controllers(){
        return $this->namespacedControllers(['ProfileUpdateDataController']);
    }

    private function namespacedControllers($controllersArray){
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$controllersArray);
    }
}