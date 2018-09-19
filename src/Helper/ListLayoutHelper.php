<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\ResourceList;

class ListLayoutHelper
{
    private $id;
    private $defaultLayout = ['ID' => 'id'];

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function get(){
        $Data = ResourceList::with('Layout')->find($this->id);
        return $this->getLayout($Data->Layout);
    }

    private function getLayout($Layout){
        return ($Layout->isEmpty()) ? $this->defaultLayout : $Layout->mapWithKeys(function($layout){
            return [$layout->label => $this->getLayoutProps($layout)];
        });
    }

    private function getLayoutProps($layout){
        $path = $this->getRelationPath($layout);
        $field = $layout->field;
        return ['field' => $field, 'path' => $path];
    }

    private function getRelationPath($layout){
        $relations =  Helper::Help('DeepRelation',$layout);
        return Helper::Help('ChainRelation',$relations,['snakecase' => true]);
    }

}