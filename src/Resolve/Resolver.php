<?php

namespace Milestone\Appframe\Resolve;

class Resolver extends Resolve
{
    protected $type, $idns, $method;
    protected $res;

    public function __construct($type,$idns = [],$method = null)
    {
        parent::__construct();
        $this->type = $type; $this->idns = $idns; $this->method = $method;
        $this->init();
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
        $this->setControllers();
    }

    private function setResolveData(){
        $this->bag->r('type',$this->method ?: $this->type);
        $this->bag->r('idns',$this->idns);
        $this->bag->r('method',$this->method);
    }

    private function initTypeClass(){
        $Class = 'Milestone\\Appframe\\Resolve\\' . $this->getResolverName($this->type);
        $this->res = new $Class;
    }

    private function getResolverName($keyword){
        return $keyword . 'Resolver';
    }

    private function responseResolveData(){
        if($this->res->yes()){
            $action = $this->bag->req('action');
            $type = $this->bag->r('type'); $method = $this->bag->r('method');
            $idns = array_fill_keys($this->res->idns(),null);
            array_walk($idns,function(&$value,$key,$array){ $value = array_key_exists($key,$array) ? $array[$key] : $value; },$this->bag->r('idns'));
            $compact = array_merge(compact('type','method'),$idns);
            $this->bag->store('Resolve',$action,array_filter($compact));
        }
    }

    private function setControllers(){
        $this->bag->keep('Controllers',$this->res->controllers());
    }

}