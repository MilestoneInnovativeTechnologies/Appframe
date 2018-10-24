<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceFormFieldOption;

class FieldOptionHelper
{
    private $id, $Model, $ForeignField = null;
    public $latest = 0, $orm = false;


    public function __construct($id)
    {
        $this->id = $id;
        $this->Model = ResourceFormFieldOption::find($id);
    }

    public function get(){
        $method = implode("",['get',$this->Model->type,'Options']);
        return $this->$method();
    }

    private function getEnumOptions(){
        $this->Model->load(['Field.Data','Field.Form']);
        $deepRelations = Helper::Help('DeepRelation',$this->Model->Field->Data);
        $resource_id = (empty($deepRelations)) ? $this->Model->Field->Form->resource : end($deepRelations)['relate_resource'];
        $attribute = $this->Model->Field->Data->attribute;
        $enum_options = Helper::Help('ResourceFieldEnum',$resource_id,[ 'field' => $attribute ]);
        return [ 'options' => array_combine($enum_options,$enum_options), 'latest' => 0 ];
    }

    private function getListOptions(){
        $model = $this->Model; $limit = 0; $latest = $this->latest;
        $list = Helper::Help('ListData',$model->detail, compact('limit','latest'));
        return ($this->orm) ? $list : [ 'options' => $list->pluck($model->label_attr,$model->value_attr)->toArray(), 'latest' => date('Y-m-d H:i:s',strtotime($list->max('updated_at'))) ] ;
    }

    private function getForeignOptions(){
        $model = $this->Model->load(['Field.Data','Field.Form.Resource']);
        $deepRelations = Helper::Help('DeepRelation',$model->Field->Data);
        $table = (empty($deepRelations)) ? $model->Field->Form->Resource->table : Resource::find(end($deepRelations)['relate_resource'])->table;
        $resource = (!empty($deepRelations) && end($deepRelations)['type'] === 'belongsToMany')
            ? $this->getResourceFromTable($table)
            : $this->getResourceFromForeignTable($table,$model->Field->Data->attribute);
        $Class = implode("\\",[$resource->namespace,$resource->name]);
        $Latest = $this->latest; $orm = (new $Class)->where('updated_at','>',$Latest);
        return ($this->orm) ? $orm : [ 'options' => $orm->pluck($model->label_attr,$this->ForeignField)->toArray(), 'latest' => date('Y-m-d H:i:s',strtotime($orm->max('updated_at'))) ];
    }

    private function getMethodOptions(){
        return [ 'options' => [],'latest' => 0 ];
    }

    private function getResourceFromForeignTable($table,$field){
        $Foreign = Helper::Help('ForeignTableField',$table, [ 'field' => $field ]);
        $this->ForeignField = $Foreign['field'];
        return $this->getResourceFromTable($Foreign['table']);
    }

    private function getResourceFromTable($table){
        return Resource::where('table',$table)->first();
    }

}
