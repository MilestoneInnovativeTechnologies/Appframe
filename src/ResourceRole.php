<?php

namespace Milestone\Appframe;

class ResourceRole extends Model
{
    protected $table = '__resource_roles';
    protected $with = ['Resource'];

    protected $actionsJoinedDelimiter = ',';
    public function getActionsAttribute($actions){
        $resource = $this->resource; $type = $this->actions_availability; $actions = $actions ?: '';
        $method = ($type === 'Only') ? 'whereIn' : 'whereNotIn';
        $ORM = ResourceAction::with(['Lists','Data','Method'])->where('resource',$resource);
        return ($type === 'All')
            ? $ORM->get()
            : $ORM->{$method}('id',explode($this->actionsJoinedDelimiter,$actions))->get();
    }

    public function setActionsAttribute($value){
        $this->attributes['actions'] = implode($this->actionsJoinedDelimiter,(array) $value);
    }

    public function Resource(){
        return $this->belongsTo(Resource::class, 'resource', 'id');
    }
}
