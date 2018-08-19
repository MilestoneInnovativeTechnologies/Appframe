<?php

namespace Milestone\Appframe\Register;

class Engine
{
    static public $All = [
        \Milestone\Appframe\Engine\GetForm::class,
        \Milestone\Appframe\Engine\ValidateFormSubmit::class,
        \Milestone\Appframe\Engine\FormSubmit::class,
        \Milestone\Appframe\Engine\GetList::class,
    ];
}