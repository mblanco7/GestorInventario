<?php

namespace App\Models\JWT;

use App\Models\Firebase\Model;
use DateTimeImmutable;
use Exception;
use Illuminate\Support\Facades\Config;
use ReflectionClass;

class Payload extends Model{

    public function __construct(array|object|null $atributos = []) {
        $rf = new ReflectionClass($this::class);
        foreach ($atributos??[] as $key => $value) {
            try {
                if ($rf->getProperty($key) != null && $value != null) {
                    $this->$key = $value;
                }
            } catch (Exception $e) {}
        }
    }

    public static function standard() : Payload {
        $passwordTimeout = Config::get('auth.password_timeout');
        $return = new Payload();
        $return->iss = 'GestorInventario';
        $return->iat = (new DateTimeImmutable())->getTimestamp();
        $return->nbf = $return->iat;
        $return->exp = $return->iat + ($passwordTimeout ?? 0);
        return $return;
    }

    public string $iss;
    public int    $iat;
    public int    $nbf;
    public int    $exp;

    public object $usuario;
    public object  $perfil;
    public array  $roles;

}