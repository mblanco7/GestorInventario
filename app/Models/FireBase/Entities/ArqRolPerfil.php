<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class ArqRolPerfil extends Model
{
    static function path() : string { return 'ArqRolesPerfiles'; }

    public ArqPerfil $perfil;
    public ArqRol $rol;
    public bool $activo;

}