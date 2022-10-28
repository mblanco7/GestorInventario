<?php

namespace App\Models\Firebase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\Firebase\Entities\InvPiso;

class InvPisoList extends AbstractList
{
    public function current(): InvPiso {
        return parent::current();
    }
    public function get(int $position): InvPiso {
        return parent::get($position);
    }
    public function add(InvPiso $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvPiso $object) : void {
        parent::setA($position, $object);
    }
}
