<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvBodega;

class InvBodegaList extends AbstractList
{
    public function current(): InvBodega {
        return parent::current();
    }
    public function get(int $position): InvBodega {
        return parent::get($position);
    }
    public function add(InvBodega $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvBodega $object) : void {
        parent::setA($position, $object);
    }
}
