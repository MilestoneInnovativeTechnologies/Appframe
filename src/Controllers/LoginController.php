<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as NativeLoginController;

class LoginController extends NativeLoginController
{
    public function __construct(Request $request)
    {
        //$this->logout();
        $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }


    protected $redirectTo = '/root';

}
