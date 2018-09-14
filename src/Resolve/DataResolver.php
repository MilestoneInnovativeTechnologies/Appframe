<?php

namespace Milestone\Appframe\Resolve;

class DataResolver extends Resolve
{
    public function yes(){
        return !$this->bag->req('data');
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('data_id',$idn1);
        $this->bag->r('record_id',$this->bag->req('id'));
        $this->bag->r('init',!$this->bag->req('data'));
    }

    public function controllers(){
        $Controllers = ['GetDataController'];
        if($this->yes()) $Controllers[] = 'GetDataDetailsController';
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

}