<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceFormFieldOption;

class FieldOptionHelper
{
    private $id, $Model;


    public function __construct($id)
    {
        $this->id = $id;
        $this->Model = ResourceFormFieldOption::find($id);
    }

    public function get(){
        if($this->Model->enum == 'Yes') return $this->getEnumeratedOptions();
        elseif ($this->Model->resource_list) return $this->getListOptions();
        else return [];
    }

    private function getEnumeratedOptions(){
        $this->Model->load(['Field.Data','Field.Form']);
        $deepRelations = Helper::Help('DeepRelation',$this->Model->Field->Data);
        $resource_id = (empty($deepRelations)) ? $this->Model->Field->Form->resource : end($deepRelations)['relate_resource'];
        $attribute = $this->Model->Field->Data->attribute;
        $enum_options = Helper::Help('ResourceFieldEnum',$resource_id,[ 'field' => $attribute ]);
        return array_combine($enum_options,$enum_options);
    }

    private function getListOptions(){
        $model = $this->Model;
        $list = Helper::Help('ListData',$model->resource_list, [ 'limit' => 0 ]);
        return $list->pluck($model->label_attr,$model->value_attr);
    }

    private function getForeignOptions(){
        $model = $this->Model->load(['Field.Data','Field.Form.Resource']);
        $deepRelations = Helper::Help('DeepRelation',$model->Field->Data);
        $table = (empty($deepRelations)) ? $model->Field->Form->Resource->table : Resource::find(end($deepRelations)['relate_resource'])->table;
        $field = $model->Field->Data->attribute;
        $Foreign = Helper::Help('ForeignTableField',$table, [ 'field' => $field ]);
        $resource = Resource::where('table',$Foreign['table'])->first();
        $Class = implode("\\",[$resource->namespace,$resource->name]);
        return (new $Class)->get()->pluck($model->label_attr,$model->$Foreign['field']);
    }

}