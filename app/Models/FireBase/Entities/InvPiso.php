<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvPiso extends Model
{
    static function path() : string { return 'InvPisos'; }

    public string $codigo;
    public InvBodega $bodega; 
    public bool $activo;

}