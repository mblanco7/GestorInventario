<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class ArqUsuario extends Model
{
    static function path() : string { return 'ArqUsuarios'; }

    public string $usuario;
    public string $contrasenia;
    public ?ArqPerfil $perfil;
    public bool $activo;
    
}
