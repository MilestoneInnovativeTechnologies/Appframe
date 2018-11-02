<?php

namespace Milestone\Appframe\Controllers;

class ResourceFormFieldDependController extends Controller
{

    public function formResource($form){
        return \Milestone\Appframe\Model\ResourceForm::find($form)->resource;
    }

}