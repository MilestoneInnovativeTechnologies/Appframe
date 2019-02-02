<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Model\ResourceActionMethod;

class GetAddRelationActionsController extends Controller
{

    public function index(){
        $available_actions = array_keys($this->bag->session('actions'));
        $relation = $this->bag->r('relation_id'); $action = $this->bag->r('action');
        $resource_actions = ResourceActionMethod::where(['type' => 'AddRelation','idn1' => $relation])->pluck('resource_action');
        $actions = ($resource_actions->isNotEmpty())
            ? $resource_actions->filter(function($action) use($available_actions){ return in_array($action,$available_actions); })
            : [];
        $this->bag->store('AddRelationAction',$action,[$relation => $actions]);
    }

}