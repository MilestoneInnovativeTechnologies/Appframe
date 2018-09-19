<?php

namespace Milestone\Appframe\Helper;

class Helper
{
    private $Class, $PrimaryArgument, $Object;

    public function __construct($item)
    {
        $Class = $this->getClassName($item);
        $qClass = $this->getQualifiedClassName($Class);
        $this->Class = $qClass;
    }

    public function setPrimaryAttribute($id){
        $this->PrimaryArgument = $id;
        $this->setObject();
        return $this;
    }

    public function setAttribute($name, $value){
        $Attributes = [$name => $value];
        $this->Object->set($Attributes);
        return $this;
    }

    public function get(){
        return $this->Object->get();
    }

    public static function Help($item,$id,$attrs = []){
        $Object = (new self($item))->setPrimaryAttribute($id);
        if($attrs && is_array($attrs) && !empty($attrs)){
            foreach($attrs as $prop => $val)
                $Object = $Object->setAttribute($prop,$val);
        }
        return $Object->get();
    }

    private function getClassName($item){
        return ucfirst($item) . 'Helper';
    }

    private function getQualifiedClassName($Class){
        return __NAMESPACE__ . "\\" . $Class;
    }

    private function setObject(){
        $Class = $this->Class;
        $Id = $this->PrimaryArgument;
        $this->Object = new $Class($Id);
    }

}