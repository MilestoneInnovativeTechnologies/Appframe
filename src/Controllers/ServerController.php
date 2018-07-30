<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use Milestone\Appframe\ResourceForm;

class ServerController extends Controller
{

    public function serve(){
        return request()->merge([
            'controller' => 'ServerController',
            'method' => 'serve',
        ])->merge(ResourceForm::with('Fields')->find("1")->toArray())->all();
    }

}
