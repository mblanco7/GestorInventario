<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvPasillo extends Model
{
    static function path() : string { return 'InvPasillos'; }

    public string $codigo;
    public InvPiso $piso; 
    public bool $activo;

}