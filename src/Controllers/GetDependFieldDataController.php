<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\Resource;

class GetDependFieldDataController extends Controller
{

    private $form, $field, $resource, $value_attr, $label_attr, $text_attr;
    protected $optionTypes = ['select','checkbox','radio'];

    public function index(){
        $form_id = $this->bag->r('form_id'); $field_id = $this->bag->r('field_id'); $data = $this->bag->r('data');
        $this->field = $field = $this->getFormFieldDetails($form_id,$field_id);
        $Where = Helper::Help('DependFieldWhere',$field_id,compact('data'));
        $orm = $this->getFieldOrm($field,$Where);
        $this->store($form_id,$orm);
    }

    private function getFormFieldDetails($form,$field){
        $this->form = Helper::Help('Form',$form);
        return $this->form->Fields->where('id',$field)->first();
    }

    private function getFieldOrm($field,$Where){
        $type = $field->type; $this->setResource($this->form->resource);
        $ORM = (in_array($type,$this->optionTypes))
            ? $this->getFieldOptionOrm($field->Options)
            : $this->getFieldResourceOrm($field->Depends->last())
            ;
        $orm = true;
        return Helper::Help('GetOrm',$ORM,compact('orm','Where'));
    }

    private function setResource($resource){
        $this->resource = Resource::find($resource);
    }

    private function getFieldOptionOrm($Option){
        $this->label_attr = $Option->label_attr;
        $this->value_attr = $Option->value_attr ?: 'id';//Helper::Help('ForeignTableField',$this->resource->table, [ 'field' => $this->field->first()->Data->attribute ])['field'];
        return Helper::Help('FieldOption',$Option->id,['orm' => true]);
    }

    private function getFieldResourceOrm($lastDepend){
        $this->text_attr = $lastDepend->value_db_field;
        $class = implode("\\",[$this->resource->namespace,$this->resource->name]);
        return new $class;
    }

    private function store($form,$orm){
        if($this->text_attr){
            $attribute = $this->text_attr;
            $data = $orm->first(); $value = ($data) ? $data->$attribute : '';
            $this->bag->store('DependValue',$form,[ $this->field->name => $value ]);
        } else {
            $Options = $orm->pluck($this->label_attr,$this->value_attr);
            $this->bag->store('FieldOption',$this->field->Options->id,$Options);
        }
    }

}