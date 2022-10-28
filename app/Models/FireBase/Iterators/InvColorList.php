<?php

namespace App\Models\Firebase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\Firebase\Entities\InvColor;

class InvColorList extends AbstractList
{
    public function current(): InvColor {
        return parent::current();
    }
    public function get(int $position): InvColor {
        return parent::get($position);
    }
    public function add(InvColor $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvColor $object) : void {
        parent::setA($position, $object);
    }
}
