<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvProducto;

class InvProductoList extends AbstractList
{
    public function current(): InvProducto {
        return parent::current();
    }
    public function get(int $position): InvProducto {
        return parent::get($position);
    }
    public function add(InvProducto $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvProducto $object) : void {
        parent::setA($position, $object);
    }
}
