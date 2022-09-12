<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Root
{
    static function path() : string { return "root/"; }

    public ArqUsuario $arqUsuario;

}
