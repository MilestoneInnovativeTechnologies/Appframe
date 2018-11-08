<?php

namespace Milestone\Appframe\Model;

class ResourceFormUpload extends Model
{
    protected $table = '__resource_form_upload';
    protected $guarded = [];
    protected $appends = ['url'];

    public function getUrlAttribute(){
        return \Storage::disk($this->disk)->url($this->file);
    }
}
