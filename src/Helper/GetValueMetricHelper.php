<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Facades\DB;

class GetValueMetricHelper
{
    private $metric;
    public $unit = 'DAY',$amount = 1;
    protected $specialUnits = ['WTD','WTD2','MTD','QTD','HTD','YTD'];

    public function __construct($metric)
    {
        $this->metric = $metric;
    }

    public function get(){
        $metric = $this->metric;
        $listOrm = $this->getListORM($metric->resource_list);
        $Select = [DB::raw($this->getValueSelect($metric->aggregate,$metric->aggregate_field,$metric->aggregate_distinct))];
        if($metric->field){
            $intervals = $this->getIntervals();
            $Select[] = DB::raw($this->getStateSelect($metric->field,$intervals['__SELECT']));
            $where = $this->getStateWhere($metric->field,$intervals['__WHERE']);
            $listOrm = $listOrm->groupBy(DB::raw('__STATE'))->whereRaw($where);
        }
        return $listOrm->select($Select)->get();
    }

    private function getListORM($id){
        return Helper::Help('ListData',$id,['orm' => true]);
    }

    private function getValueSelect($aggregate = 'COUNT',$field = 'id',$distinct = 'No'){
        $field = ($distinct === 'Yes') ? 'DISTINCT ' . $field : $field;
        return $aggregate . '(' . $field . ') __VALUE';
    }

    private function getIntervals(){
        $unit = $this->unit;
        if(in_array($unit,$this->specialUnits)){
            $days = 0; $previous = 0;
            extract(Helper::Help('DateUnit',$unit));
        } else {
            $previous = $days = $this->amount-1;
            $previous = $previous ?: 1;
        }
        return [
            '__SELECT' => 'INTERVAL '.$days.' ' .$unit,
            '__WHERE' => 'INTERVAL '.($days+$previous).' '.$unit
        ];
    }

    private function getStateSelect($field,$interval){
        return 'IF(' . $field . ' >= DATE(now() - ' . $interval . '),"CURRENT","PREVIOUS") __STATE';
    }

    private function getStateWhere($field,$interval){
        return $field . ' >= DATE(now() - ' . $interval . ')';
    }
}