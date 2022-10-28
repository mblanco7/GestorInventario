<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class ArqRol extends Model
{

    static function path() : string { return 'ArqRoles'; }

    public string $nombre;
    public string $descripcion;
    public bool $activo;

}