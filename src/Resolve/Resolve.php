<?php

namespace Milestone\Appframe\Resolve;


class Resolve
{
    protected $type;
    protected $idns;
    protected $method;

    public function __construct($type,$idns = [],$method = null)
    {
        $this->type = $type;
        $this->idns = $idns;
        $this->method = $method;
        return $this;
    }

    static public function Resolve($array){
        $type = array_get($array,'type');
        $method = array_get($array,'method');
        $idns = array_except($array,['type','method']);
        new self($type,$idns,$method);
    }

}