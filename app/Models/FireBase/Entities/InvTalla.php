<?php

namespace App\Models\Firebase\Entities;

use App\Models\Firebase\Model;

class InvTalla extends Model
{
    static function path() : string { return 'InvTallas'; }

    public string $codigo;
    public bool $activo;

}