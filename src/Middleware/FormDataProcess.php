<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Bag;
use Milestone\Appframe\Helper\Helper;

class FormDataProcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('__form_data')){
            $files = json_decode($request->get('__files'));
            $input = [];
            foreach($request->all() as $key => $value){
                if($key === 'data'){
                    $data = [];
                    foreach($value as $dName => $dValue){
                        if($dValue){
                            $fdVal = in_array($dName,$files) ? $this->storeFile($dValue,$request->form,$dName) : json_decode($dValue);
                            $data[$dName] = $fdVal;
                        }
                    }
                    $input['data'] = $data;
                } elseif(!in_array($key,['__form_data','__files'])){
                    $input[$key] = json_decode($value);
                }
            }
            $request->replace($input); $bag = resolve(Bag::class); $bag->setRequests($input);
        };
        return $next($request);
    }

    private function storeFile($file,$form,$field){
        $store = Helper::Help('StoreFile',$file,compact('form','field'));
        return $store->code;
    }

}
