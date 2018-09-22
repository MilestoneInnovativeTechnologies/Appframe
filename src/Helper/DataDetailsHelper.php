<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceData;

class DataDetailsHelper
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $Data = ResourceData::with(['Sections' => function($Q){ $Q->with(['Relation','Items.Relation']); }])->find($this->id);
        return $Data;
    }

}