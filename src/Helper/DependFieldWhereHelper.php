<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceFormFieldDepend;

class DependFieldWhereHelper
{
    private $id;
    public $data;
    protected $Depends, $operator_string = ':operator';


    public function __construct($id)
    {
        $this->id = $id;
        $this->Depends = ResourceFormFieldDepend::whereFormField($id)->get();
    }

    public function get(){
        if($this->nullIgnorable()) return null;
        return $this->getWhereArrayFromDepends($this->Depends);
    }

    private function nullIgnorable(){
        return $this->Depends->isEmpty() ||
            ($this->Depends->contains('ignore_null','Yes') &&
                !collect(array_values($this->data))->every(function ($value){ return ($value !== null && trim($value) !== ''); })
            );
    }

    private function getWhereArrayFromDepends($Depends){
        $where = [];
        $Depends->each(function($depend) use(&$where){
            $field = $depend->db_field; $data = $this->data[$depend->depend_field]; $operator = $depend->operator;
            $value = $depend->compare_method ? $this->getCompareMethodApplied($depend->compare_method,$data) : $data;
            $where[$field] = $value; $where[$this->getOperatorKey($field)] = $operator;
        });
        return $where;
    }

    private function getCompareMethodApplied($method,$data){
        $ControllerClass = Helper::Help('GetResourceControllerClass','ResourceFormFieldDepend',['field' => 'name']);
        if(!$ControllerClass || !method_exists($Controller = new $ControllerClass,$method)) return null;
        return call_user_func([$Controller,$method],$data);
    }

    private function getOperatorKey($field){
        return $field . $this->operator_string;
    }

}