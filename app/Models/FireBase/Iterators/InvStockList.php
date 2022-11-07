<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvStock;

class InvStockList extends AbstractList
{
    public function current(): InvStock {
        return parent::current();
    }
    public function get(int $position): InvStock {
        return parent::get($position);
    }
    public function add(InvStock $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvStock $object) : void {
        parent::setA($position, $object);
    }
}
