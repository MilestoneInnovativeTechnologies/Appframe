<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Str;

class ChainRelationHelper
{
    private $relations;
    public $json = false;

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
        return ($this->json) ? Str::snake($text) : $text;
    }

}