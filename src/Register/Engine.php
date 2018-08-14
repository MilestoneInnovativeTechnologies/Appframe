<?php

namespace Milestone\Appframe\Register;

class Engine
{
    static public $All = [
        \Milestone\Appframe\Engine\Form::class,
        \Milestone\Appframe\Engine\FormSubmit::class,
        \Milestone\Appframe\Engine\dList::class,
    ];
}