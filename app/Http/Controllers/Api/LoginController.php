<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\Services\ArqUsuariosService;
use App\Models\JWT\Payload;
use App\Models\StandardResponse;
use App\Services\JWTGenerator;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private ArqUsuariosService $service;
    private JWTGenerator $jwt;

    public function __construct(
        ArqUsuariosService $service,
        JWTGenerator $jwt
    )
    {
        $this->service = $service;
        $this->jwt = $jwt;
    }

    public function getToken(Request $request) {
        $response = new StandardResponse();
        $requestData = $request->all();
        if ($requestData['usuario'] == null || $requestData['usuario'] == '') {
            return $this->returnMessage400("Debe ingresar el nombre de usuario");
        }
        if ($requestData['contrasenia'] == null || $requestData['contrasenia'] == '') {
            return $this->returnMessage400("Debe ingresar el nombre de usuario");
        }
        try {
            $user = $this->service->validarExisteUsuario($requestData['usuario'], $requestData['contrasenia']);
        } catch (Exception $e) {
            return $this->returnMessage500("Problemas al intentar consultar el usuario");
        }
        if ($user != null) {
            $payload = Payload::standard();
            $payload->usuario = $user;
            $payload->perfil = $user->perfil;
            $payload->usuario->perfil = null;
            $token = $this->jwt->generateJWT((array) $payload);
            $response->data = $token;
        } else {
            $user = $this->service->getUsuarioPorNombre($requestData['usuario']);
            if ($user != null) {
                return $this->returnMessage401("Contraseña incorrecta");
            } else {
                return $this->returnMessage401("El nombre de usuario es incorrecto o no existe");
            }
        }
        return $this->return200($response);
    }

    public function validateToken(Request $request) {
        $response = new StandardResponse();
        $tokenData = new Payload($request->get('TokenData'));
        $usuario_nombre = $tokenData->usuario->usuario;
        $response->data = $usuario_nombre;
        return $this->return200($response);
    }

}