<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTGenerator {

    private $key='Ud1GpG1kJw7%';

    public function generateJWT(array $payload) {
        $encode = JWT::encode($payload, $this->key, 'HS256');
        return $encode;
    }

    public function decode($jwt) {
        $decode = JWT::decode($jwt, new Key($this->key, 'HS256'));
        return $decode;
    }

}