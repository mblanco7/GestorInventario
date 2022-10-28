<?php

namespace App\Models\Firebase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\Firebase\Entities\InvEstante;

class InvEstanteList extends AbstractList
{
    public function current(): InvEstante {
        return parent::current();
    }
    public function get(int $position): InvEstante {
        return parent::get($position);
    }
    public function add(InvEstante $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvEstante $object) : void {
        parent::setA($position, $object);
    }
}
