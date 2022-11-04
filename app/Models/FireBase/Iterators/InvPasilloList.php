<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvPasillo;

class InvPasilloList extends AbstractList
{
    public function current(): InvPasillo {
        return parent::current();
    }
    public function get(int $position): InvPasillo {
        return parent::get($position);
    }
    public function add(InvPasillo $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvPasillo $object) : void {
        parent::setA($position, $object);
    }
}
