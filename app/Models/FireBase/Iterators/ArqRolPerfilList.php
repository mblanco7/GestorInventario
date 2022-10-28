<?php

namespace App\Models\Firebase\Iterators;

use App\Core\Types\AbstractList;
use App\Models\Firebase\Entities\ArqRolPerfil;

class ArqRolPerfilList extends AbstractList
{
    public function current(): ArqRolPerfil {
        return parent::current();
    }
    public function get(int $position): ArqRolPerfil {
        return parent::get($position);
    }
    public function add(ArqRolPerfil $object) : void {
        parent::addA($object);
    }
    public function set(int $position, ArqRolPerfil $object) : void {
        parent::setA($position, $object);
    }
}