<?php

namespace Milestone\Appframe\Helper;

class GetFormDataMapHelper
{
    private $form;
    public $data;
    protected $template = ['resource_form' => NULL, 'resource_data' => NULL, 'form_field' => NULL,'attribute' => NULL, 'relation' => NULL];

    public function __construct($form)
    {
        $this->form = $form;
    }

    public function get(){
        if($this->form != '2' || $this->data != '1') return null;
        $data = $this->getFormDataMap($this->form,$this->data);
        return $this->relationModify($data);
    }

    private function getFormDataMap($form,$data){
        return collect([
            collect(['resource_form' => 2, 'resource_data' => 1, 'form_field' => 7,'attribute' => null, 'relation' => 1, 'nest_relation1' => NULL, 'nest_relation2' => NULL, 'nest_relation3' => NULL, 'nest_relation4' => NULL, 'nest_relation5' => NULL]),
            collect(['resource_form' => 2, 'resource_data' => 1, 'form_field' => 6,'attribute' => 'email', 'relation' => NULL, 'nest_relation1' => NULL, 'nest_relation2' => NULL, 'nest_relation3' => NULL, 'nest_relation4' => NULL, 'nest_relation5' => NULL]),
        ]);
    }

    private function relationModify($data){
        $template = collect($this->template);
        return $data->map(function ($record) use($template){
            $data = collect($record)->intersectByKeys($template);
            if($record['relation']) $data['relation'] = Helper::Help('ChainRelation',Helper::Help('DeepRelation',$record),['json' => true]);
            return $data;
        });
    }
}