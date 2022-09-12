<?php

namespace App\Models\Firebase\Entities\Arquitectura;

use App\Models\Firebase\Model;
use App\Models\Firebase\Entities\Root;

class ArqUsuario extends Model
{
    static function path() : string { return Root::path().'/Arquitectura/ArqUsuarios'; }

    public string $usuario;
    public string $contrasenia;

}
