<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function fresh(){
        return request()->user()->toArray();
    }

}
