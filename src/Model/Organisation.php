<?php

namespace Milestone\Appframe\Model;

class Organisation extends Model
{
    protected $table = '__organisation';

    public function Contacts(){
        return $this->hasMany(OrganisationContact::class,'organisation','id');
    }
}
