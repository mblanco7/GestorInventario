<?php

namespace App\Models;

class StandardResponse {

    public string|int|float|bool|null $data = null;
    public ?object $objeto  = null;
    public ?array  $listado = null;
    public ?string $mensaje = null;
    
    public ?bool   $correctToken = false;
    public ?int    $status       = null;

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString() {
        return json_encode($this);
    }

}