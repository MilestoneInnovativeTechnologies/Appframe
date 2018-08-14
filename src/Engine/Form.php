<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\ResourceForm;

class Form extends Base
{
    /*
     * This engine will be included once all the conditions
     * in this array succeeded
     * The key will be matched against request()->input() to value.
     * If value is plain text, string comparison performs
     * If value starting with @, predefined method check will performs
     *
     */
    static $on = [
        'item.type' => 'Form',
        'item.item' =>  '@isNotEmpty',
    ];

    /*
     * The things to be return with response are needed to be store into bag
     * $this->bag->store(name,id,data)
     * where name will be the root property name in response having data indexed by id
     * The things to keep in bag are kept by calling
     * $this->bag->keep(name,data)
     * To get the kept data out of bag, call
     * $this->bag->get(name)
     */
    public function boot(){
        $formId = request()->input('item.item');
        $this->bag->store('Form',$formId,ResourceForm::with(['Fields' => function($Q){ $Q->with(['Attributes','Options']); }])->find($formId));
    }
}