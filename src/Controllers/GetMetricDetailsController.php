<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;

class GetMetricDetailsController extends Controller
{

    public function index(){
        $MetricId = $this->bag->r('metric_id');
        $MetricData = Helper::Help('MetricDetails',$MetricId);
        $MetricData['time'] = time();
        $this->bag->store('MetricDetails',$MetricId,$MetricData);
    }

}