<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvStock extends Model
{
    
    public InvProducto $producto;
    public InvTalla $talla;
    public InvColor $color;
    public InvPuesto $ubicacion;
    public int $cantidad;
    public float $valor;

}