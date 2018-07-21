<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{

    public function init(){
        dd(request()->user());
        return 'init';
    }

}
