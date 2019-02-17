<?php

namespace Milestone\Appframe\Traits;


trait AddSignatureTrait
{
    private function getModelFields($Model){
        return $Model->getConnection()->getSchemaBuilder()->getColumnListing($Model->getTable());
    }
    private function hasSignatureAble($Model,$Audit = 'created_by'){
        $Fields = $this->getModelFields($Model);
        $User = Request()->user();
        return (
            $Fields && $User
            && is_array($Fields) && in_array($Audit,$Fields)
            && $User->id
        );
    }
    private function setModelAttribute($Model,$Attribute,$Value){
        $Model->setAttribute($Attribute,$Value);
    }

}