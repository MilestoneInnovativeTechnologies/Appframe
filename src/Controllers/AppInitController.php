<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Str;
use Milestone\Appframe\Model\ResourceActionMethod;

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
        $Collection = request()->user()->load(['Groups' => function($Q){ $Q->withoutGlobalScope('withoutSetup')->with('Roles.Resources'); }]);
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
        $Actions = $Actions->map->id->toArray();
        return ResourceActionMethod::whereIn('resource_action',$Actions)->get()->mapWithKeys(function($item){
            return [$item->resource_action => collect($item)->only(['type','method','idn1','idn2','idn3','idn4','idn5'])->filter()];
        });
    }

    public function setTokenSalt(){
        $token_salt = implode('-',[request()->user()->id,Str::random(8),time()]);
        $token_sqno = random_int(111,333);
        session(compact('token_salt','token_sqno'));
    }


}
