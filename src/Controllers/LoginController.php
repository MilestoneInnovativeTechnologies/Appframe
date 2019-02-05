<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as NativeLoginController;

class LoginController extends NativeLoginController
{

    protected function loggedOut(Request $request)
    {
        return redirect()->route(config('appframe.logged_out_route') ?: 'login');
    }

    public function redirectTo(){
        return route('init');
    }

}
