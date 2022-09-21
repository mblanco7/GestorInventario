<?php

namespace App\Models;

class StandardResponse {

    public string|int|float|null $data = null;
    public ?object $objeto  = null;
    public ?array  $listado = null;
    public ?string $mensaje = null;
    
    public ?bool   $correctToken = false;
    public ?int    $status       = null;

}