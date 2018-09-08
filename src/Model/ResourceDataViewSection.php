<?php

namespace Milestone\Appframe\Model;

class ResourceDataViewSection extends Model
{
    protected $table = '__resource_data_view_sections';

    public function Items(){
        return $this->hasMany(ResourceDataViewSectionItem::class, 'section','id');
    }
}
