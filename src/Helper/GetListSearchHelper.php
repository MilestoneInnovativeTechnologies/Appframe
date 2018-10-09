<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceListSearch;

class GetListSearchHelper
{
    private $id;
    public $term;
    protected $operator_string = ':operator';

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $collection = $this->getEloquentCollection($this->id);
        return $this->getWhereSearchArrayFromCollection($collection,$this->term);
    }

    private function getEloquentCollection($id){
        $Search = ResourceListSearch::whereResourceList($id)->get();
        return ($Search->isNotEmpty()) ? $Search : collect([
            ['id' => 1, 'resource_list' => $id, 'relation' => null, 'field' => 'id']
        ]);
    }

    private function getWhereSearchArrayFromCollection($collection,$term){
        $term = $this->getSearchModifiedTerm($term);
        return $collection->mapWithKeys(function($item) use($term){
                return ($item['relation']) ? null : [$item['field'] => $term];
        })->toArray();
    }

    private function getSearchModifiedTerm($term){
        return implode('',['%',$term,'%']);
    }

}