<?php

namespace Milestone\Appframe\Register;

use Illuminate\Http\Request;
use Milestone\Appframe\Register\CompareMethods as CM;

class Frame
{

    protected $Engines = [];
    private $SpecialCharacters = ['@'];
    private $SpecialCharacterToMethod = [
        '@' => 'performPredefinedMethodCheck'
    ];

    public function __construct(){
        foreach(Engine::$All as $Engine){
            $On = $Engine::$on;
            if($this->isEngineIn($On))
                $this->Engines[] = $Engine;
        }
    }

    static public function Engines(){
        return (new self)->Engines;
    }

    private function isEngineIn($On){
        $Yes = true;
        foreach ($On as $input => $value){
            $Yes = ($this->isStringComparison($value))
                ? request()->input($input) == $value
                : $this->specialComparison(request()->input($input),$value);
            if($Yes !== true) return false;
        }
        return $Yes;
    }

    private function isStringComparison($data){
        return !in_array(mb_substr($data,0,1),$this->SpecialCharacters);
    }

    private function specialComparison($data, $special){
        $char = mb_substr($special,0,1);
        $method = $this->SpecialCharacterToMethod[$char];
        $function = mb_substr($special,1);
        return $this->$method($function,$data);
    }

    private function performPredefinedMethodCheck($method, $data){
        return CM::{$method}($data);
    }

}