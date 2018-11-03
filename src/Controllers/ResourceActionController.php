<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceFormField;

class ResourceActionController extends Controller
{
    private $TypeModel = [
        'Form' => ['ResourceForm','name'],
        'List' => ['ResourceList','name'],
        'Data' => ['ResourceData','name'],
        'Dashboard' => ['ResourceDashboard','name'],
        'FormWithData' => ['ResourceForm','name'],
    ];

    public function id1List($form = null, $field = null, $data = null){
        if($form){
            if(!array_key_exists($data['method_type'],$this->TypeModel)) return null;
            $resource = $data['resource'];
            $Model = $this->TypeModel[$data['method_type']]; $Class = implode("\\",["Milestone\Appframe\Model",$Model[0]]);
            $options = (new $Class)->whereHas('Resource',function($Q) use($resource){ $Q->where('id',$resource); })->pluck($Model[1],'id')->toArray();
            $option_id = ResourceFormField::find($field)->Options->id;
            $this->bag->store('FieldOption',$option_id,$options);
            return null;
        } else {
            return [ 'options' => [],'latest' => 0 ];
        }
    }

}