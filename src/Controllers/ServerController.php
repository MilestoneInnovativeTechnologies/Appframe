<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use Milestone\Appframe\ResourceForm;
use Milestone\Appframe\ResourceList;

class ServerController extends Controller
{
    public function serve(){
        if(request()->input('item.type') == 'Form'){
            return request()->merge([
                'Form' => ResourceForm::with(['Fields' => function($Q){ $Q->with(['Attributes','Options']); }])->find(request()->input('item.item')),
            ]);
        } elseif(request()->input('item.type') == 'List'){
            return request()->merge([
                'List' => $list = ResourceList::find(request()->input('item.item')),
                'Resource' => $resource = \Milestone\Appframe\Resource::find($list->resource),
                'Class' => $class = implode("\\",[$resource->namespace,$resource->name]),
                'Data' => (new $class)->all()
            ]);
        } else
        return request()->merge([
            'controller' => 'ServerController',
            'method' => 'serve',
        ])->all();
    }

}
