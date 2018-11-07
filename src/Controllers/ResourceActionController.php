<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceFormField;
use Milestone\Appframe\Model\ResourceRelation;

class ResourceActionController extends Controller
{
    private $TypeModel = [
        //MethodType => [ModelName,OptionLabel_dbField,CompareRelation_ModelName,fieldNameOfUserInputToCompare
        //,methodNameToConvertUserInputToAnyRequiredValue]
        'Form' => ['ResourceForm','name','Resource','resource',null],
        'List' => ['ResourceList','name','Resource','resource',null],
        'Data' => ['ResourceData','name','Resource','resource',null],
        'Dashboard' => ['ResourceDashboard','name','Resource','resource',null],
        'FormWithData' => ['ResourceForm','name','Resource','resource',null],
        'ListRelation' => ['ResourceRelation','name','Owner','resource',null],
        'AddRelation' => ['ResourceRelation','name','Owner','resource',null],
        'ManageRelation' => ['ResourceRelation','name','Owner','resource',null],
    ];
    private $ID2TypeModel = [
        'FormWithData' => ['ResourceData','name','Resource','resource',null],
        'ListRelation' => ['ResourceList','name','Resource','idn1','getRelateRelationFromRelation'],
        'AddRelation' => ['ResourceForm','name','Resource','idn1','getRelateRelationFromRelation'],
        'ManageRelation' => ['ResourceList','name','Resource','idn1','getRelateRelationFromRelation'],
    ];

    public function id1List($form = null, $field = null, $data = null){
        if($form){
            if(array_key_exists($data['method_type'],$this->TypeModel))
                $this->getOptions($this->TypeModel[$data['method_type']], $field, $data);
            return null;
        } else {
            return [ 'options' => [],'latest' => 0 ];
        }
    }

    public function id2List($form = null, $field = null, $data = null){
        if($form){
            if(array_key_exists($data['method_type'],$this->ID2TypeModel))
                $this->getOptions($this->ID2TypeModel[$data['method_type']], $field, $data);
            return null;
        } else {
            return [ 'options' => [],'latest' => 0 ];
        }
    }

    private function getOptions($Model, $field = null, $data = null){
        $comp_data = ($Model[4]) ? call_user_func([$this,$Model[4]],$data[$Model[3]]) : $data[$Model[3]];
        $Class = implode("\\",["Milestone\Appframe\Model",$Model[0]]);
        $options = (new $Class)->whereHas($Model[2],function($Q) use($comp_data){ $Q->where('id',$comp_data); })->pluck($Model[1],'id')->toArray();
        $option_id = ResourceFormField::find($field)->Options->id;
        $this->bag->store('FieldOption',$option_id,$options);
    }

    private function getRelateRelationFromRelation($relation){
        return ResourceRelation::find($relation)->relate_resource;
    }

}
