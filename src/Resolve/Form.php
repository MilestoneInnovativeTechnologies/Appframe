<?php

namespace Milestone\Appframe\Resolve;

use Milestone\Appframe\Bag;

class Form
{
    private $bag;

    public function __construct()
    {
        $this->bag = resolve(Bag::class);
    }

    public function yes(){
        return empty($this->bag->req('data'));
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('item',$idn1);
    }
}