<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use Milestone\Appframe\Requests\SetupUser;

class SetupController extends Controller
{

    public function create(SetupUser $request){
        $request->store_setupuser();
        return redirect()->route('login');
    }

    public function index(){
        return view('Appframe::setup');
    }


}
