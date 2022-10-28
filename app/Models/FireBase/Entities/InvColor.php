<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvColor extends Model
{
    static function path() : string { return 'InvColores'; }

    public string $codigo;
    public string $nombre;
    public bool $activo;

}