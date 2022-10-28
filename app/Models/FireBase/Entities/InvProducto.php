<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvProducto extends Model
{
    static function path() : string { return 'InvProductos'; }

    public string $codigo;
    public string $nombre;
    public string $descripcion;
    public string $caracteristicas;
    public InvMarca $marca;
    public InvCategoria $categoria;
    public bool $activo;

}