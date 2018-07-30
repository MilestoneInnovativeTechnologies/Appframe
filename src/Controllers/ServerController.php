<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;

class ServerController extends Controller
{

    public function serve(){
        return request()->merge([
            'controller' => 'ServerController',
            'method' => 'serve',
        ])->all();
    }

}
