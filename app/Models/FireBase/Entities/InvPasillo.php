<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvPasillo extends Model
{
    static function path() : string { return 'InvPasillos'; }

    public string $codigo;
    public InvPiso $piso; 
    public bool $activo;

}