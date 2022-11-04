<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\ArqRol;

class ArqRolList extends AbstractList
{
    public function current(): ArqRol {
        return parent::current();
    }
    public function get(int $position): ArqRol {
        return parent::get($position);
    }
    public function add(ArqRol $object) : void {
        parent::addA($object);
    }
    public function set(int $position, ArqRol $object) : void {
        parent::setA($position, $object);
    }
}
