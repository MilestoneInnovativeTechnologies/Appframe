<?php

namespace Milestone\Appframe\Register;

use Illuminate\Http\Request;

class Bag
{

    private $request = null;
    private $store = [];
    private $keep = [];

    public function __construct()
    {
        $this->setRequest(request()->all());
    }

    public function store($item, $key, $data, $merge = false){
        if(!array_key_exists($item,$this->store)) $this->store[$item] = [];
        if(!array_key_exists($key,$this->store[$item])) $this->store[$item][$key] = NULL;
        elseif($merge) $data = array_merge_recursive($this->store[$item][$key],$data);
        $this->store[$item][$key] = $data;
    }

    public function keep($item, $data, $storeId = NULL){
        $this->keep[$item] = $data;
        if($storeId !== NULL) $this->store($item, $storeId, $data);
    }

    public function get($item){
        return $this->keep[$item];
    }

    public function setRequest($request){
        $this->request = $request;
    }

    public function dump(){
        return array_merge($this->store,['request' => $this->request]);
    }

}