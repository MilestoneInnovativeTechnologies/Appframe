<?php

namespace Milestone\Appframe\Engine;

use Milestone\Appframe\Resource;
use Milestone\Appframe\ResourceList;

class dList extends Base
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
        'item.type' => 'List',
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
        $listId = request()->input('item.item');
        $this->bag->keep('List',ResourceList::find($listId));
        $this->bag->keep('Resource',Resource::find($this->bag->get('List')->resource));
        $class = implode("\\",[$this->bag->get('Resource')->namespace,$this->bag->get('Resource')->name]);
        $this->bag->store('List',$listId, (new $class)->all());
        $this->bag->store('Resource','List', $this->bag->get('Resource'));
    }
}