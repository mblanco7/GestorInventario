<?php

namespace App\Models\Firebase\Entities\Arquitectura;

use App\Models\Firebase\Model;
use App\Models\Firebase\Entities\Root;

class ArqPerfil extends Model
{
    static function path() : string { return Root::path().'/Arquitectura/ArqPerfiles'; }
    static function pref() : string { return 'arqprf'; }

    public string $nombre;
    public string $descripcion;
    public bool $activo;

}