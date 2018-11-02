<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\Resource;

class GetResourceControllerClassHelper
{
    private $id;
    public $field = 'id';

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $Resource = Resource::where($this->field,$this->id);
        $Resource = $Resource->count() ? $Resource->first() : null;
        return $Resource ? $this->getResourceClass($Resource) : null;
    }

    private function getResourceClass($Resource){
        $NS = $Resource->controller_namespace; $C = $Resource->controller;
        return ($NS && $C) ? implode("\\",[$NS,$C]) : null;
    }

}