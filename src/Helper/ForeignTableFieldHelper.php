<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Facades\DB;

class ForeignTableFieldHelper
{
    private $table;
    public $field;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function get(){
        $db = $this->db();
        return ($db) ? [
            'table' =>  $db->table,
            'field' =>  $db->field,
        ] : [ 'table' => null, 'field' => null ];
    }

    private function db(){
        return DB::table('INFORMATION_SCHEMA.KEY_COLUMN_USAGE')
            ->select("REFERENCED_TABLE_NAME as table","REFERENCED_COLUMN_NAME as field")
            ->where("TABLE_NAME",$this->table)->where("COLUMN_NAME",$this->field)
            ->first();
    }

}