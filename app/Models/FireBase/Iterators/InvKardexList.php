<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvKardex;

class InvKardexList extends AbstractList
{
    public function current(): InvKardex {
        return parent::current();
    }
    public function get(int $position): InvKardex {
        return parent::get($position);
    }
    public function add(InvKardex $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvKardex $object) : void {
        parent::setA($position, $object);
    }
}
