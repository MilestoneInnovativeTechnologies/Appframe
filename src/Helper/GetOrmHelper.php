<?php

namespace Milestone\Appframe\Helper;

class GetOrmHelper
{
    private $class;
    private $operator_string = ':operator', $items_per_page = 25, $specialOperators = ['In','NotIn','like'];
    public $orm = false, $With = [], $Scopes = [], $Where = [], $Search = [], $Page = 0, $Skip = 0, $Take = 25;
    protected $ORM;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function get(){
        $this->ORM = ($this->orm) ? $this->class : new $this->class;
        $this->process();
        return $this->ORM;
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
            $this->ORM = $this->ORM->with($with);
    }

    private function processScopes(){
        $scopes = $this->Scopes;
        if($scopes && is_array($scopes) && !empty($scopes) ){
            foreach ($scopes as $scope) {
                $attrs = isset($scope[1]) ? $scope[1] : []; $method = $scope[0];
                if ($attrs && !empty($attrs)) $this->ORM = call_user_func_array([$this->ORM, $method], $attrs);
                else $this->ORM = call_user_func([$this->ORM, $method]);
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
                $this->ORM = (in_array($operator,$this->specialOperators)) ? $this->getSpecialWhereAppliedOrm($this->ORM,$field,$operator,$value) : $this->ORM->where($field,$operator,$value);
            }
        }
    }

    private function getSpecialWhereAppliedOrm($orm,$field,$operator,$value){
        if($operator === 'like') return $this->getLikeWhereAppliedOrm($orm,$field,$value);
        return $orm->{ 'where'.$operator }($field,(array) $value);
    }

    private function getLikeWhereAppliedOrm($orm,$field,$value){
        return $orm->where($field,'like',$this->getLikeWrapTerm($value));
    }

    private function getLikeWrapTerm($term){
        return implode('',['%',$term,'%']);
    }

    private function processSearch(){
        $search = $this->Search;
        if($search && is_array($search) && !empty($search) ){
            $this->ORM = $this->ORM->where(function($Q) use($search){
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
            $this->ORM = $this->ORM->skip($skip);
    }

    private function processTake(){
        $take = $this->Take;
        if($take && $take > 0)
            $this->ORM = $this->ORM->take($take);
    }

}