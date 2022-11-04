<?php

namespace App\Models\FireBase\Entities;

use App\Models\FireBase\Model;

class InvTalla extends Model
{
    static function path() : string { return 'InvTallas'; }

    public string $codigo;
    public bool $activo;

}