<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceDashboard;

class GetDashboardHelper
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        return ResourceDashboard::with(['Sections.Items'])->find($this->id);
    }
}