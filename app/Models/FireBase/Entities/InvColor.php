<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvColor extends Model
{
    static function path() : string { return 'InvColores'; }

    public string $codigo;
    public string $nombre;
    public bool $activo;

}