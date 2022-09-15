<?php

namespace App\Models\Firebase\Entities\Arquitectura;

use App\Models\Firebase\Model;

class ArqUsuario extends Model
{
    static function path() : string { return 'ArqUsuarios'; }

    public string $usuario;
    public string $contrasenia;
    public ArqPerfil $perfil;
    
}
