<?php

namespace Milestone\Appframe\Model;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if($this->files && is_array($this->files) && !empty($this->files)){
            $this->setAppends(['__upload_file_details']);
        }
    }

    public function getUploadFileDetailsAttribute(){
        $files = [];
        foreach($this->files as $field){
            if($this->$field) $files[$field] = ResourceFormUpload::find($this->$field);
        }
        return $files;
    }
}
