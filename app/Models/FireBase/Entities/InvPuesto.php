<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvPuesto extends Model
{
    static function path() : string { return 'InvPuestos'; }

    public string $codigo;
    public InvEstante $estante; 
    public bool $activo;

}