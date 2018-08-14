<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\Register\Bag;

class Base
{

    protected $bag = null;

    public function __construct(Bag $bag)
    {
        $this->bag = $bag;
    }

}