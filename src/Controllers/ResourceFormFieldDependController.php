<?php

namespace Milestone\Appframe\Controllers;

class ResourceFormFieldDependController extends Controller
{

    public function formResource($form){
        return \Milestone\Appframe\Model\ResourceForm::find($form)->resource;
    }

    public function relationRelate($relation){
        return \Milestone\Appframe\Model\ResourceRelation::find($relation)->relate_resource;
    }

}
