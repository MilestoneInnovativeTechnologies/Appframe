<?php

namespace Milestone\Appframe\Helper;

class ChainRelationHelper
{
    private $relations, $snakecase = true;

    public function __construct($relations)
    {
        $this->relations = $relations;
    }

    public function get(){
        if(empty($this->relations)) return '';
        return collect($this->relations)->map(function($relation){ return $this->modifier($relation['method']); })->implode(".");
    }

    public function set($Ary){
        foreach ($Ary as $key => $val)
            $this->$key = $val;
    }

    private function modifier($text){
        return ($this->snakecase) ? snake_case($text) : $text;
    }

}