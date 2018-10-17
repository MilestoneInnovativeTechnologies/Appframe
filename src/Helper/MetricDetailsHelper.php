<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceMetric;

class MetricDetailsHelper
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        return ResourceMetric::find($this->id);
    }

}