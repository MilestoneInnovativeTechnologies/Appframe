<?php

namespace Milestone\Appframe\Helper;

use Illuminate\Support\Arr;
use Milestone\Appframe\Model\ResourceForm;
use Milestone\Appframe\Model\ResourceFormUpload;

class StoreFileHelper
{

    private $file;
    public $form, $field;
    protected $path, $disk;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function get(){
        $this->setPathAndDisk($this->form,$this->field);
        $path = $this->file->store($this->path,$this->disk);
        $attributes = array_merge($this->resourceUploadAttributes($this->file),['disk' => $this->disk, 'path' => $this->path, 'file' => $path]);
        $rfu = ResourceFormUpload::create($attributes);
        return $rfu;
    }

    private function setPathAndDisk($form,$field){
        $Form = ResourceForm::with('Resource','Fields.Data')->find($form); $Resource = $Form->Resource; $Field = $Form->Fields->where('name',$field)->first();
        $Relation = Helper::Help('DeepRelation',$Field->Data);
        $RelationResource = (!empty($Relation)) ? Resource::find(Arr::last($Relation)['relate_resource']) : null;
        $attribute = (!empty($Relation)) ? Arr::last($Relation)['attribute'] : $Field->Data->attribute;

        $storage = null;
        if($RelationResource) $storage = Helper::Help('GetResourceStorage',$RelationResource,compact('form','field','attribute'));
        if(!$storage) { $default = true; $storage = Helper::Help('GetResourceStorage',$Resource,compact('form','field','attribute','default')); }

        $this->path = trim($storage['path'],'/');
        $this->disk = $storage['disk'];
    }

    private function resourceUploadAttributes($file){
        $name = $file->hashName();
        $name_client = $file->getClientOriginalName();
        $mime = $file->getMimeType();
        $mime_client = $file->getClientMimeType();
        $size = $file->getClientSize();
        $extension = $file->extension();
        return compact('name','name_client','mime','mime_client','size','extension');
    }
}
