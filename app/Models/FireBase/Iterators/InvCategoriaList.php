<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\InvCategoria;

class InvCategoriaList extends AbstractList
{
    public function current(): InvCategoria {
        return parent::current();
    }
    public function get(int $position): InvCategoria {
        return parent::get($position);
    }
    public function add(InvCategoria $object) : void {
        parent::addA($object);
    }
    public function set(int $position, InvCategoria $object) : void {
        parent::setA($position, $object);
    }
}
