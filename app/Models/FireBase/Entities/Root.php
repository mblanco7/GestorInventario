<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;

class Root
{
    static function path() : string { return "root"; }

    public ArqUsuario $arqUsuario;

}
