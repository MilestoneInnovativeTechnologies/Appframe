<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;
use Milestone\Appframe\ResourceRole;
use Milestone\Appframe\User;

class AppInitController extends Controller
{

    public function init(){
        $User = request()->user();// dd($User->toArray());
        $Groups = $this->getUserGroups($User);//->map(function($item){ return $item->only(['id','name','title']); });
        $Roles = $this->getGroupRoles($Groups);//->map(function($item){ return $item->only(['id','name','title']); });
        //dd($User->toArray(),$Groups->toArray(),$Roles->toArray());
        //$Resources = $this->getRoleResources($Roles);
        return redirect()->route('root');
    }

    private function getUserGroups($User){
        return $User->Groups;
    }

    private function getGroupRoles($Groups){
        return $Groups->map(function($item){ return $item->Roles; })->flatten();
    }

    private function getRoleResources($Roles){
        //return $Roles->map(function($item){ return $item->only(['id','name','title']); });
    }

}
