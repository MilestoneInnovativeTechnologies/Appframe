<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceDashboard;

class GetDashboardItemsHelper
{
    private $id,$sections = null;

    public function __construct($id)
    {
        $this->id = $id;
        $RD = ResourceDashboard::with(['Sections.Items'])->find($this->id);
        $this->sections = $RD ? $RD->Sections : null;
    }

    public function get(){
        return (!$this->sections || $this->sections->isEmpty()) ? null :
            $this->sections->flatMap(function($section){
                $items = $section->Items;
                return ($items->isEmpty()) ? null :
                    $items->mapWithKeys(function($item){
                        return [$item->id => $item->only(['item','item_id','item_id2'])];
                    });
            });
    }
}