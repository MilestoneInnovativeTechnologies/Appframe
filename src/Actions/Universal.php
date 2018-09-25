<?php

namespace Milestone\Appframe\Actions;

class Universal
{
    public static function Actions(){
        return (new self())->actions;
    }

    protected $actions = [
        'option'
    ];

}