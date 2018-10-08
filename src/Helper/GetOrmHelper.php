<?php

namespace Milestone\Appframe\Helper;

class GetOrmHelper
{
    private $class;
    private $operator_string = ':operator', $items_per_page = 25;
    public $With = [], $Scopes = [], $Where = [], $Search = [], $Page = 0, $Skip = 0, $Take = 25;
    protected $orm;

    public function __construct($class)
    {
        $this->class = $class;
        $this->orm = new $class;
    }

    public function get(){
        $this->process();
        return $this->orm;
    }

    private function process(){
        $this->processWith();
        $this->processScopes();
        $this->processWhere();
        $this->processSearch();
        $this->processPage();
        $this->processSkip();
        $this->processTake();
    }

    private function processWith(){
        $with = $this->With;
        if($with && !empty($with))
            $this->orm = $this->orm->with($with);
    }

    private function processScopes(){
        $scopes = $this->Scopes;
        if($scopes && is_array($scopes) && !empty($scopes) ){
            foreach ($scopes as $scope) {
                $attrs = isset($scope[1]) ? $scope[1] : []; $method = $scope[0];
                if ($attrs && !empty($attrs)) $this->orm = call_user_func_array([$this->orm, $method], $attrs);
                else $this->orm = call_user_func([$this->orm, $method]);
            }
        }
    }

    private function processWhere(){
        $where = $this->Where;
        if($where && is_array($where) && !empty($where) ){
            foreach ($where as $field => $value) {
                if(mb_substr($field,-9) === $this->operator_string) continue;
                $operator_key = $field . $this->operator_string;
                $operator = array_key_exists($operator_key,$where) ? $where[$operator_key] : '=';
                $this->orm = $this->orm->where($field,$operator,$value);
            }
        }
    }

    private function processSearch(){
        $search = $this->Search;
        if($search && is_array($search) && !empty($search) ){
            $this->orm = $this->orm->where(function($Q) use($search){
                $idx = 0;
                foreach ($search as $field => $value) {
                    if(mb_substr($field,-9) === $this->operator_string) continue;
                    $operator_key = $field . $this->operator_string;
                    $operator = array_key_exists($operator_key,$search) ? $search[$operator_key] : 'like';
                    $Q->{ ($idx++) ? 'orWhere' : 'where' }($field,$operator,$value);
                }
            });
        }
    }

    private function processPage(){
        $page = $this->Page;
        if($page !== 0) {
            $this->Take = $this->Take ?: $this->items_per_page;
            $this->Skip = $this->Skip ?: $this->Take * ($page - 1);
        }
    }

    private function processSkip(){
        $skip = $this->Skip;
        if($skip && $skip > 0)
            $this->orm = $this->orm->skip($skip);
    }

    private function processTake(){
        $take = $this->Take;
        if($take && $take > 0)
            $this->orm = $this->orm->take($take);
    }

}