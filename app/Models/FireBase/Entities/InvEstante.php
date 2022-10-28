<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvEstante extends Model
{
    static function path() : string { return 'InvEstantes'; }

    public string $codigo;
    public InvPasillo $pasillo; 
    public bool $activo;

}