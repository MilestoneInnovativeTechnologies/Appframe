<?php

namespace Milestone\Appframe\Model;

class ResourceFormUpload extends Model
{
    protected $table = '__resource_form_upload';
    protected $guarded = [];
    protected $appends = ['url'];

    public function setCodeAttribute($Code = NULL){
        $this->attributes['code'] = ($Code)?:$this->NewCode();
    }

    private function ALP($N, $MIN = 1, $MAX = 26, $ALP = "ABCDEFGHIJKLMNOPQRSTUVWXYZ", $SIZE = 1){
        $ALPAry = str_split($ALP,$SIZE); $Step = (1+$MAX-$MIN)/count($ALPAry);
        $Index = intval(round($N/$Step)); return (array_key_exists($Index,$ALPAry))?$ALPAry[$Index]:$ALPAry[array_rand($ALPAry,1)];
    }

    private function NewCode(){
        $CodePrefixChar = date("y").$this->ALP(date("W"),1,52).$this->ALP(date("j"),1,31).str_pad(date("z"),3,"0",STR_PAD_LEFT).$this->ALP(date("G"),0,23).$this->ALP(date("i"),0,59).$this->ALP(date("s"),0,59);
        $TotalCodeLength = 12;
        $LastNum = 0; $PrefixLength = strlen($CodePrefixChar); $NumberLength = $TotalCodeLength - $PrefixLength;
        $WhereValue = "^" . $CodePrefixChar . "[0-9]{" . $NumberLength . "}$";
        $LastCode = $this->withoutGlobalScopes()->where('code',"REGEXP",$WhereValue)->max('code');
        if($LastCode) $LastNum = intval(mb_substr($LastCode,$PrefixLength));
        return ($CodePrefixChar . (str_pad(++$LastNum,$NumberLength,"0",STR_PAD_LEFT)));
    }

    public function getUrlAttribute(){
        return \Storage::disk($this->disk)->url($this->file);
    }
}
