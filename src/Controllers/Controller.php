<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Controllers\BaseController\BaseController;
use Milestone\Appframe\Bag;

class Controller extends BaseController
{
    protected $bag;

    public function __construct()
    {
        $this->bag = resolve(Bag::class);
    }

    public function runControllers(){
        $Controllers = $this->bag->get('Controllers');
        if($Controllers && !empty($Controllers))
            array_walk($Controllers,function ($controller){ (new $controller)->index(); });
    }
}
