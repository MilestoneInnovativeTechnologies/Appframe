<?php

namespace Milestone\Appframe\Helper;

class GetMetricHelper
{
    private $id, $metric;

    public function __construct($id)
    {
        $this->id = $id;
        $this->metric = Helper::Help('MetricDetails',$id);;
    }

    public function get(){
        $type = ucfirst($this->metric->type); $helper = implode('',['Get',$type,'Metric']);
        return Helper::Help($helper,$this->metric);
    }
}