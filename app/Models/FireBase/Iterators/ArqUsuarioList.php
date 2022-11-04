<?php

namespace App\Models\FireBase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\FireBase\Entities\ArqUsuario;

class ArqUsuarioList extends AbstractList
{
    public function current(): ArqUsuario {
        return parent::current();
    }
    public function get(int $position): ArqUsuario {
        return parent::get($position);
    }
    public function add(ArqUsuario $object) : void {
        parent::addA($object);
    }
    public function set(int $position, ArqUsuario $object) : void {
        parent::setA($position, $object);
    }
}
