<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    private $Salt = 'IlLeGaL';
    private $delimiter = 3;
    private $padString = '=';

    public function tokenRespond($token){return response("1",200, ['x-appframe-token' => $token]);}

    public function fresh(){
        $token = $this->getCreateToken();
        return $this->tokenRespond($token);
    }
    public static function next(){return (new self)->getNextToken();}
    public static function isValid($token){return (new self)->isTokenValid($token);}

    public function setTokenToSession($token){session(compact('token'));}

    private function getCreateToken(){
        $Salt = session('token_salt');
        $SqNo = session('token_sqno');
        return $this->createToken($Salt,$SqNo);
    }
    private function createToken($S,$N){
        $A = $this->eSalt($S); $B = $this->beN($N);
        return $A.$B;
    }

    private function eSalt($salt){return $this->geB64($this->gHash($salt));}

    private function geB64($Text){return base64_encode($Text);}
    private function gdB64($Text){return base64_decode($Text);}

    private function gHash($Text){return md5($Text);}

    private function beN($N){return str_pad(base_convert($N,10,32),$this->delimiter,$this->padString,STR_PAD_LEFT);}
    private function bdN($N){return base_convert($N,32,10);}

    private function getNextToken(){
        $this->incrementTokenSeq();
        return $this->getCreateToken();
    }

    private function incrementTokenSeq(){
        $token_sqno = session('token_sqno') + 1;
        session(compact('token_sqno'));
    }

    private function isTokenValid($token){
        $Parts = $this->getTokenParts($token);
        return $Parts[0] == $this->eSalt(session('token_salt'))
            && $Parts[1] == session('token_sqno');
    }

    private function getTokenParts($token){
        $Salt = session('token_salt'); $eSalt = $this->eSalt($Salt);
        $Search = "/^(\\" . $this->padString .")*/";
        $bNum = $this->bdN(str_replace($Search,"",str_replace($eSalt,"",$token)));
        return [$eSalt,$bNum];
    }

}
