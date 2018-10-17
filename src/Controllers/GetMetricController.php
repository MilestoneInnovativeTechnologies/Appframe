<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetMetricController extends Controller
{

    public function index(){
        $MetricId = $this->bag->r('metric_id');
        $Data = Helper::Help('GetMetric',$MetricId);
        $this->bag->store('Metric',$MetricId,$Data);
    }

}