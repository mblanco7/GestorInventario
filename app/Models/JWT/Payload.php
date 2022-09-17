<?php

namespace App\Models\JWT;

class Payload {

    public static function standard() : Payload {
        $return = new Payload();
        $return->iss = 'GestorInventario';
        $return->iat = strtotime(date('d-m-y h:i:s')); 
        return $return;
    }

    public string $iss;
    public int    $iat;
    public int    $exp;

    public string $usuario;
    public mixed  $perfil;
    public array  $roles;

}