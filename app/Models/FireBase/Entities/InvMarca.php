<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvMarca extends Model
{
    static function path() : string { return 'InvMarcas'; }

    public string $codigo;
    public string $nombre;
    public string $descripcion;
    public bool $activo;

}