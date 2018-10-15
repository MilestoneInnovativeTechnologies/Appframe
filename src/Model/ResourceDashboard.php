<?php

namespace Milestone\Appframe\Model;

class ResourceDashboard extends Model
{
    protected $table = '__resource_dashboard';

    public function Sections(){
        return $this->hasMany(ResourceDashboardSection::class,'resource_dashboard','id');
    }

    public function Resource(){
        return $this->belongsTo(Resource::class,'resource','id');
    }
}
