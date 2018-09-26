<?php

namespace Milestone\Appframe;

use Illuminate\Http\Request;

class Bag
{

    private $request = null;
    private $resolve = [];
    private $store = [];
    private $keep = [];
    private $session = null;

    public function __construct()
    {
        $this->setRequests(request()->all());
        $this->setSessions();
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
        return (array_key_exists($item,$this->keep)) ? $this->keep[$item] : null;
    }

    public function setRequests($request){
        $this->request = $request;
    }

    public function setSessions(){
        $this->session = session()->all();
    }

    public function req($key){
        return array_get($this->request, $key);
    }

    public function r($key,$value = null){
        return ($value) ? $this->storeResolve($key,$value) : array_get($this->resolve, $key);
    }

    private function storeResolve($key,$value){
        return $this->resolve[$key] = $value;
    }

    public function session($key, $value = NULL){
        return ($value || is_array($key)) ? $this->setSession($key, $value) : array_get($this->session,$key);
    }

    public function setSession($key, $value = NULL){
        if(is_array($key)) session($key);
        else session()->put($key, $value);
        $this->setSessions();
        return $value;
    }

    public function push($key, $id, $data){
        $session = $this->session($key) ?: [];
        $session[$id] = $data;
        return $this->setSession($key,$session);
    }

    public function dump(){
        return array_merge($this->store,['request' => $this->request]);
    }

}