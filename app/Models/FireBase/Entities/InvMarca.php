<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvMarca extends Model
{
    static function path() : string { return 'InvMarcas'; }

    public string $codigo;
    public string $nombre;
    public string $descripcion;
    public bool $activo;

}