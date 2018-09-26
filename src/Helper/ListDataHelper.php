<?php

namespace Milestone\Appframe\Helper;

class ListDataHelper
{
    private $id;
    protected $class, $scopes, $with;
    public $page = 1, $limit = 0, $latest = 0, $ids = [];

    public function __construct($id)
    {
        $this->id = $id;
        $list = Helper::Help('List',$id);
        $this->limit = $list['items'];
        $this->class = $list['orm']['Class'];
        $this->scopes = $list['orm']['Scopes'];
        $this->with = $list['orm']['With'];
    }

    public function get(){
        $Model = $this->getModel();
        return $this->getData($Model,$this->limit,(array) $this->ids);
    }

    private function getModel(){
        $Model = new $this->class;
        $Model = $this->getApplyWith($Model, $this->with);
        $Model = $this->getApplyScope($Model, $this->scopes);
        $Model = $this->getApplyLatest($Model, $this->latest);
        return $Model;
    }

    private function getApplyWith($Model, $With = []){
        return ($With && !empty($With))
            ? $Model->with($With)
            : $Model;
    }

    private function getApplyScope($Model, $Scopes = []){
        if($Scopes && !empty($Scopes)){
            foreach($Scopes as $Scope){
                $attrs = $Scope[1]; $method = $Scope[0];
                $Model = call_user_func_array([$Model, $method], $attrs);
            }
        }
        return $Model;
    }

    private function getApplyLatest($Model, $latest = 0){
        return ($latest) ? $Model->where('updated_at','>',$latest) : $Model;
    }

    private function getData($Model,$Limit,$Ids){
        if($Limit){
            $take = $Limit; $skip = ($this->page-1) * $take;
            $Model->skip($skip)->take($take);
        } return ($Ids && !empty($Ids)) ? $Model->find($Ids) : $Model->get();
    }

}