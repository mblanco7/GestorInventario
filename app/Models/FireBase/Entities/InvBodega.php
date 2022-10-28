<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvBodega extends Model
{
    static function path() : string { return 'InvBodegas'; }

    public string $codigo;
    public string $nombre;
    public string $direccion;
    public bool $activo;

}