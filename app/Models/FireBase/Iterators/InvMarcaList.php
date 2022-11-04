<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvMarca;

class InvMarcaList extends AbstractList
{
    public function current(): InvMarca {
        return parent::current();
    }
    public function get(int $position): InvMarca {
        return parent::get($position);
    }
    public function add(InvMarca $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvMarca $object) : void {
        parent::setA($position, $object);
    }
}
