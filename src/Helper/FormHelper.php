<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceForm;

class FormHelper
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        return ResourceForm::with(['Fields' => function($Q){ $Q->with(['Attributes','Options','Validations']); },'Layout'])->find($this->id);
    }


}