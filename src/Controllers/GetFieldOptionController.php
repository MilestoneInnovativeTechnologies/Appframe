<?php

namespace Milestone\Appframe\Controllers;

use Milestone\Appframe\Helper\Helper;
use Milestone\Appframe\Model\ResourceFormFieldOption;

class GetFieldOptionController extends Controller
{

    public function index(){

        $id = $this->bag->r('option_id');
        $FO = ResourceFormFieldOption::find($id);
        if($FO->enum == 'Yes'){
            $FO->load(['Field.Data','Field.Form']);
            $RO = Helper::Help('DeepRelation',$FO->Field->Data);
                $Res = (empty($RO)) ? $FO->Field->Form->resource : end($RO)['relate_resource'];
                $Fld = $FO->Field->Data->attribute;
                $OP = Helper::Help('ResourceFieldEnum',$Res,[ 'field' => $Fld ]);
                $OP = array_combine($OP,$OP);
        } elseif($FO->resource_list){
            $OP = Helper::Help('ListData',$FO->resource_list);
        }
        $this->bag->store('FieldOption',$id,$OP);
    }

}