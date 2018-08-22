<?php

namespace Milestone\Appframe\Resolve;

use Milestone\Appframe\Bag;

class Resolve
{
    protected $type, $idns, $method;
    protected $bag, $res;

    public function __construct($type,$idns = [],$method = null)
    {
        $this->type = $type; $this->idns = $idns; $this->method = $method;
        $this->bag = resolve(Bag::class); $this->init();
        return $this;
    }

    static public function Resolve($array){
        $type = array_get($array,'type');
        $method = array_get($array,'method');
        $idns = array_except($array,['type','method']);
        new self($type,$idns,$method);
    }

    private function init(){
        $this->setResolveData();
        $this->initTypeClass();
        $this->responseResolveData();
        $this->res->prepare();
    }

    private function setResolveData(){
        $this->bag->r('type',$this->method ?: $this->type);
        $this->bag->r('idns',$this->idns);
        $this->bag->r('method',$this->method);
    }

    private function initTypeClass(){
        $Class = 'Milestone\\Appframe\\Resolve\\' . $this->type;
        $this->res = new $Class;
    }

    private function responseResolveData(){
        if($this->res->yes()){
            $action = $this->bag->req('action');
            $type = $this->bag->r('type'); $method = $this->bag->r('method'); $idns = array_only($this->bag->r('idns'),$this->res->idns());
            $compact = array_merge(compact('type','method'),$idns);
            $this->bag->store('Resolve',$action,array_filter($compact));
        }
    }

}