<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvCategoria extends Model
{
    static function path() : string { return 'InvCategorias'; }

    public string $codigo;
    public string $nombre;
    public string $descripcion;
    public ?InvCategoria $padre;
    public bool $activo;

}