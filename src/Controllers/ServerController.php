<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;

class ServerController extends Controller
{

    public function serve(){
        return [
            'controller' => 'ServerController',
            'method' => 'serve',
        ];
    }

}
