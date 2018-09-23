<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceRelation;

class DeepRelationHelper
{
    private $record, $model;

    public function __construct($record)
    {
        $this->record = $record;
        $this->model = new ResourceRelation;
    }

    public function get(){
        return $this->fetchRelations($this->record)->toArray();
    }

    private function fetchRelations($record){
        return collect($record)
            ->only(['relation','nest_relation1','nest_relation2','nest_relation3','nest_relation4','nest_relation5'])
            ->filter()->map(function($relation_id){
                return (is_object($relation_id) || is_array($relation_id)) ? $this->getRelationDetails($relation_id['id']) : $this->getRelationDetails($relation_id);
            });
    }

    private function getRelationDetails($id){
        return $this->model->find($id);
    }

}