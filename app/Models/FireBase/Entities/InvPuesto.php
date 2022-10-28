<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvPuesto extends Model
{
    static function path() : string { return 'InvPuestos'; }

    public string $codigo;
    public InvEstante $estante; 
    public bool $activo;

}