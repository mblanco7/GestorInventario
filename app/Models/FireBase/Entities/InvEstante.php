<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvEstante extends Model
{
    static function path() : string { return 'InvEstantes'; }

    public string $codigo;
    public InvPasillo $pasillo; 
    public bool $activo;

}