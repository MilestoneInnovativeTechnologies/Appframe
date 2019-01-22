<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceFormDataMap;

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
        $data = $this->getFormDataMap($this->form,$this->data);
        return $this->relationModify($data);
    }

    private function getFormDataMap($resource_form,$resource_data){
        return ResourceFormDataMap::where(compact('resource_form','resource_data'))->get();
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