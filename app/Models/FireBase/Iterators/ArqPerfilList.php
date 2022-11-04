<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\ArqPerfil;

class ArqPerfilList extends AbstractList
{
    public function current(): ArqPerfil {
        return parent::current();
    }
    public function get(int $position): ArqPerfil {
        return parent::get($position);
    }
    public function add(ArqPerfil $object) : void {
        parent::addA($object);
    }
    public function set(int $position, ArqPerfil $object) : void {
        parent::setA($position, $object);
    }
}
