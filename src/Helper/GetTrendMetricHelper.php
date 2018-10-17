<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Facades\DB;

class GetTrendMetricHelper
{
    private $metric;
    public $unit = 'DAY',$amount = 30;
    protected $specialUnits = ['WTD','WTD2','MTD','QTD','HTD','YTD'];

    public function __construct($metric)
    {
        $this->metric = $metric;
    }

    public function get(){
        $metric = $this->metric;
        $listOrm = $this->getListORM($metric->resource_list);
        $Select = [DB::raw($this->getValueSelect($metric->aggregate,$metric->aggregate_field,$metric->aggregate_distinct))];
        if($metric->field){ $Select[] = DB::raw($metric->field . ' __FIELD1'); $listOrm = $listOrm->groupBy(DB::raw('__FIELD1')); }
        if($metric->field_sub){ $Select[] = DB::raw($metric->field_sub . ' __FIELD2'); $listOrm = $listOrm->groupBy(DB::raw('__FIELD2')); }
        return $listOrm->select($Select)->get();
    }

    private function getListORM($id){
        return Helper::Help('ListData',$id,['orm' => true]);
    }

    private function getValueSelect($aggregate = 'COUNT',$field = 'id',$distinct = 'No'){
        $field = ($distinct === 'Yes') ? 'DISTINCT ' . $field : $field;
        return $aggregate . '(' . $field . ') __VALUE';
    }
}