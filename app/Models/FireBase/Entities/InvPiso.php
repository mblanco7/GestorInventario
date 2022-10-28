<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvPiso extends Model
{
    static function path() : string { return 'InvPisos'; }

    public string $codigo;
    public InvBodega $bodega; 
    public bool $activo;

}