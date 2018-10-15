<?php

namespace Milestone\Appframe\Model;

class ResourceDashboardSection extends Model
{
    protected $table = '__resource_dashboard_sections';

    public function Items(){
        return $this->hasMany(ResourceDashboardSectionItem::class,'section','id');
    }
}
