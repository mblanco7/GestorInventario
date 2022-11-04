<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class ArqRolPerfil extends Model
{
    static function path() : string { return 'ArqRolesPerfiles'; }

    public ArqPerfil $perfil;
    public ArqRol $rol;
    public bool $activo;

}