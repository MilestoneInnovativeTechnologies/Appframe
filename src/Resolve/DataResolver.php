<?php

namespace Milestone\Appframe\Resolve;

class DataResolver extends Resolve
{
    public function yes(){
        return true;
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('data_id',$idn1);
        $this->bag->r('record_id',$this->bag->req('id'));
    }

    public function controllers(){
        $Controllers = ['GetDataController'];
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

}