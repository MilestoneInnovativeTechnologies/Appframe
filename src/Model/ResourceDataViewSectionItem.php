<?php

namespace Milestone\Appframe\Model;

class ResourceDataViewSectionItem extends Model
{
    protected $table = '__resource_data_view_section_items';

    public function Relation(){
        return $this->belongsTo(ResourceRelation::class, 'relation','id');
    }
}
