<?php

namespace Milestone\Appframe\Helper;

use Milestone\Appframe\Model\Resource;

class GetResourceStorageHelper
{

    private $resource;
    protected $Resource;
    public $form, $field, $attribute, $default = false;

    public function __construct($resource)
    {
        $this->resource = $resource;
        $this->Resource = (is_string($resource) || is_integer($resource)) ? Resource::find($resource) : $resource;
    }

    public function get(){
        $form = $this->form; $field = $this->field; $attribute = $this->attribute;
        $Values = [$attribute,$field,$form];
        $storage = $this->getResourceStorageDetails($this->Resource,$Values);
        if(!$storage && $this->default) $storage = $this->getStorageDetails();
        return $storage;
    }

    private function getResourceStorageDetails($Resource,$Values){
        $Object = $this->getResourceObject($Resource);
        $Storage = $this->getResourceStorage($Object);
        if($Storage){
            if(count($Storage) === 1) return $this->getStorageDetails($Storage[0]);
            else{
                $Collection = collect($Storage);
                return $this->getStorageDetails($this->checkCollectionFor($Collection,0,$Values));
            }
        }
        return null;
    }

    private function getResourceObject($Resource){
        $Class = implode('\\',[$Resource->namespace,$Resource->name]);
        return new $Class;
    }

    private function getResourceStorage($Resource){
        return ($Resource->storage && is_array($Resource->storage) && !empty($Resource->storage))
            ? $Resource->storage
            : null;
    }

    private function getStorageDetails($Array = []){
        $path = (array_key_exists('path',$Array) && !empty($Array['path'])) ? $Array['path'] : '/';
        $disk = (array_key_exists('disk',$Array) && !empty($Array['disk'])) ? $Array['disk'] : config('filesystems.default');
        return compact('path','disk');
    }

    private function checkCollectionFor($Collection,$level,$value){
        $checks = ['db_field','form_field','form'];
        $Result = $Collection->where($checks[$level],$value[$level]);
        $Results = count($Result);
        if($Results === 1) return $Result->first();
        if(count($checks) <= ++$level) {
            return ($Results === 0) ? $Collection->first() : $Result->first();
        }
        return ($Results === 0) ? $this->checkCollectionFor($Collection,$level,$value) : $this->checkCollectionFor($Result,$level,$value);
    }
}
