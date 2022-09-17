<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class ArqPerfil extends Model
{
    static function path() : string { return 'ArqPerfiles'; }

    public string $nombre;
    public string $descripcion;
    public bool $activo;

}