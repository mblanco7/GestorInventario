<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvKardex extends Model
{
    public TipoMovimiento $tipoMovimiento;
    public InvProducto $producto;
    public int $cantidad;
    public float $valor;

}

enum TipoMovimiento
{
    case entrada;
    case salida;
}
