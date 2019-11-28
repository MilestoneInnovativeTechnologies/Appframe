<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Arr;
use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\Resource;
use Milestone\Appframe\Model\ResourceFormFieldDepend;

class GetDependFieldDataController extends Controller
{

    private $form, $field, $resource, $value_attr, $label_attr, $text_attr;
    protected $optionTypes = ['multiselect','select','checkbox','radio'];

    public function index(){
        $form_id = $this->bag->r('form_id'); $field_id = $this->bag->r('field_id'); $data = $this->bag->r('data');
        return (ResourceFormFieldDepend::where('form_field',$field_id)->whereNotNull('method')->exists())
            ? $this->executeDependFieldMethod($form_id,$field_id,$data)
            : $this->executeDependFieldWhere($form_id,$field_id,$data);
    }

    private function executeDependFieldWhere($form_id,$field_id,$data){
        $this->field = $field = $this->getFormFieldDetails($form_id,$field_id);
        $Where = Helper::Help('DependFieldWhere',$field_id,compact('data'));
        $orm = $this->getFieldOrm($field,$Where);
        $this->store($form_id,$orm);
    }

    private function executeDependFieldMethod($form_id,$field_id,$data){
        $Model = ResourceFormFieldDepend::where('form_field',$field_id)->with('Field.Form.Resource')->first();
        $Resource = $Model->Field->Form->Resource; $Method = $Model->method;
        if(!Arr::has($Resource,'controller_namespace') || !Arr::has($Resource,'controller')) return null;
        $class = implode("\\",[$Resource->controller_namespace,$Resource->controller]);
        if(!method_exists($Controller = new $class,$Method)) return null;
        $DependValue = call_user_func([$Controller,$Method],$form_id,$field_id,$data);
        if(!$DependValue) return; $field_name = $this->bag->r('field_name');
        return $this->bag->store('DependValue',$form_id,is_array($DependValue) ? $DependValue : [$field_name => $DependValue],true);
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