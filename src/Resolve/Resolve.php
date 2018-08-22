<?php

namespace Milestone\Appframe\Resolve;

use Milestone\Appframe\Bag;

class Resolve
{

    protected $bag;
    public function __construct()
    {
        $this->bag = resolve(Bag::class);
    }

}