<?php

namespace Milestone\Appframe\Resolve;

use Milestone\Appframe\Helper\Helper;

class DashboardResolver extends Resolve
{
    public function yes(){
        return !$this->bag->req('item');
    }

    public function idns(){
        return ['idn1'];
    }

    public function prepare(){
        $idn1 = $this->bag->r('idns')['idn1'];
        $this->bag->r('dashboard_id',$idn1);
        if(!$this->yes()){
            $item = $this->bag->req('item'); $method = 'prepareDashboard' . $item . 'Item';
            $this->{ $method }();
        }
    }

    public function controllers(){
        $Controllers = ($this->yes()) ? ['GetDashboardController'] : [];
        if($this->bag->r('list_id')) if($this->bag->req('item_action') == 'fetch') array_push($Controllers,'GetListDetailsController','GetListController'); else array_push($Controllers,'GetListController');
        if($this->bag->r('metric_id')) if($this->bag->req('item_action') == 'fetch') array_push($Controllers,'GetMetricDetailsController','GetMetricController'); else array_push($Controllers,'GetMetricController');
        return array_map(function($controller){ return 'Milestone\\Appframe\\Controllers\\' . $controller; },$Controllers);
    }

    private function prepareDashboardListItem(){
        $items = Helper::Help('GetDashboardItems',$this->bag->r('dashboard_id'));
        $item_id = $this->bag->req('item_id');
        if($items->search(function($item)use($item_id){ return $item['item'] == 'List' && $item['item_id'] == $item_id; }) === false) return;
        $this->bag->r('list_id',$item_id);
    }

    private function prepareDashboardMetricItem(){
        $items = Helper::Help('GetDashboardItems',$this->bag->r('dashboard_id'));
        $item_id = $this->bag->req('item_id');
        if($items->search(function($item)use($item_id){ return $item['item'] == 'Metric' && $item['item_id'] == $item_id; }) === false) return;
        $this->bag->r('metric_id',$item_id);
    }

}