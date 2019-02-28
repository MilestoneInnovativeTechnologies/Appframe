<?php

namespace Milestone\Appframe\Controllers\Database;
use Illuminate\Support\Arr;

class Bind
{
    private $data;

    private $typeMethod = [
        'hasOne' => 'save',
        'hasMany' => 'saveMany',
        'belongsTo' => 'associate',
        'belongsToMany' => 'sync',
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function store(){
        $response = [];
        foreach($this->data as $data){
            $model = $this->getModel($data['class'],$data['id']);
            $response[] = $this->storeData($model,$data['records']);
        }
        return $response;
    }

    private function getModel($class, $id){
        return ($id) ? (new $class)->find($id) : new $class;
    }

    private function storeData($baseModel,$records){
        if(empty($records)) return $baseModel;
        foreach ($records as $record){
            $data = $record['data'];
            $model = !empty($data) ? $this->saveData($baseModel,$data) : $baseModel;
            if(!empty($record['relations'])){
                foreach ($record['relations'] as $relation)
                $this->processRelation($model,$relation);
            }
        }
        return $baseModel;
    }

    private function saveData($model,$data){
        $model->forceFill($data)->save();
        return $model;
    }

    private function processRelation($model,$data){
        $method = $data['method'];
        $model = $model->$method();
        $this->addRelationRecord($model,$data['records'],$data['type'],$data['class']);
    }

    private function addRelationRecord($model,$records,$type,$class){
        if(empty($records)) return $model;
        if($type === 'hasMany' && !empty(array_column($records,'relations')[0]))
            return $this->handleHasManyException($model,$records,$class);
        $data = $this->getRelationTypeData($type,$records,$class);
        $method = $this->getRelationTypeMethod($type);
        return $model->$method($data);
    }

    private function handleHasManyException($baseModel,$records,$class){
        foreach($records as $record){
            $data = !empty($record['data']) ? (new $class)->forceFill($record['data']) : null;
            $model = ($data) ? $baseModel->save($data) : $baseModel;
            if(!empty($record['relations'])){
                foreach ($record['relations'] as $relation)
                    $this->processRelation($model,$relation);
            }
        }
        return $baseModel;
    }

    private function getRelationTypeData($type,$records,$class){
        $method = 'get'.$type.'Data';
        return $this->$method($records,$class);
    }

    private function gethasOneData($records,$class){
        return (new $class)->forceFill(reset($records)['data']);
    }

    private function gethasManyData($records,$class){
        return array_map(function($record) use($class){
            return (new $class)->forceFill($record['data']);
        },$records);
    }

    private function getbelongsToData($records,$class){
        return array_keys($records)[0];
    }

    private function getbelongsToManyData($records,$class){
        $data = [];
        foreach($records as $id => $record)
            if(array_key_exists("",$record['data'])) $data[$record['data'][""]] = Arr::except($record['data'],"");
            elseif(is_array(array_values($record['data'])) && count($records) === 1) $data = array_values($record['data'])[0];
            else $data[$id] = $record['data'];
        return $data;
    }

    private function getRelationTypeMethod($type){
        return $this->typeMethod[$type];
    }


}
