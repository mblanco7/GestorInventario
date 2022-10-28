<?php

namespace App\Models\Firebase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\Firebase\Entities\InvTalla;

class InvTallaList extends AbstractList
{
    public function current(): InvTalla {
        return parent::current();
    }
    public function get(int $position): InvTalla {
        return parent::get($position);
    }
    public function add(InvTalla $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvTalla $object) : void {
        parent::setA($position, $object);
    }
}
