<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class ArqPerfil extends Model
{
    static function path() : string { return 'ArqPerfiles'; }

    public string $nombre;
    public string $descripcion;
    public bool $activo;

}