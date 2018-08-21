<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\ResourceAction;
use Milestone\Appframe\ResourceActionMethod;

class AppInitController extends Controller
{

    public function init(){
        $this->setSessions();
        return redirect()->route('root');
    }

    private function setSessions(){
        $this->setActions();
        $this->setTokenSalt();
    }

    private function setActions(){
        session(['actions' => $this->getActions()->toArray()]);
    }

    private function getActions(){
        $Collection = request()->user()->load('Groups.Roles.Resources');
        $Actions = $this->extractActions($Collection);
        return $this->extractMethods($Actions);
    }

    public function extractActions($Collection){
        $Iterate = collect(['Roles','Resources','actions']);
        return $Iterate->reduce(function($Collection,$Iteratee){
            return $Collection->flatMap(function($Value) use ($Iteratee) { return $Value->$Iteratee; });
        },$Collection->Groups);
    }

    public function extractMethods($Actions){
        return ResourceActionMethod::whereIn('resource_action',$Actions->map->id->toArray())->get()->mapWithKeys(function($item){ return [$item->resource_action => collect($item)->only(['type','method','idn1','idn2','idn3','idn4','idn5'])->filter()]; });
        //return $Actions->mapWithKeys(function($Value){ return [$Value->id => array_filter($Value->Method->only(['type','method','idn1','idn2','idn3','idn4','idn5']))]; });
    }

    public function setTokenSalt(){
        $token_salt = implode('-',[request()->user()->id,str_random(8),time()]);
        $token_sqno = random_int(111,333);
        session(compact('token_salt','token_sqno'));
    }


}
