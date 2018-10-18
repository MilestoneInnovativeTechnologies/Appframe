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
        return ResourceForm::with([
            'Fields' => function($Q){ $Q->with(['Attributes','Options','Validations','Depends','Dynamics']); },
            'Layout',
            'Collections' => function($Q){ $Q->with([
                'Form' => function($Q){ $Q->with([
                    'Fields' => function($Q){ $Q->with(['Attributes','Options','Validations','Depends','Dynamics']); },
                    'Layout']); },
                'Relation']); }])
            ->find($this->id);
    }


}