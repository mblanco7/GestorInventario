<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class ArqRol extends Model
{

    static function path() : string { return 'ArqRoles'; }

    public string $nombre;
    public string $descripcion;
    public bool $activo;

}