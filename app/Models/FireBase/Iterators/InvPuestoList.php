<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvPuesto;

class InvPuestoList extends AbstractList
{
    public function current(): InvPuesto {
        return parent::current();
    }
    public function get(int $position): InvPuesto {
        return parent::get($position);
    }
    public function add(InvPuesto $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvPuesto $object) : void {
        parent::setA($position, $object);
    }
}
