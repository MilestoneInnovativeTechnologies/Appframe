<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Facades\DB;
use Milestone\Appframe\Model\Resource;

class ResourceFieldEnumHelper
{
    private $resource_id, $table;
    public $field;

    public function __construct($resource_id)
    {
        $this->resource_id = $resource_id;
        $this->table = Resource::find($resource_id)->table;
    }

    public function get(){
        $enumStr = DB::select(DB::raw('SHOW COLUMNS FROM '.$this->table.' WHERE Field = "'.$this->field.'"'))[0]->Type;
        preg_match_all("/'([^']+)'/", $enumStr, $matches);
        return isset($matches[1]) ? $matches[1] : [];
    }

}