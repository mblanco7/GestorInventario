<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvBodega extends Model
{
    static function path() : string { return 'InvBodegas'; }

    public string $codigo;
    public string $nombre;
    public string $direccion;
    public bool $activo;

}