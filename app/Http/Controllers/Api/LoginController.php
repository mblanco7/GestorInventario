<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\Services\ArqUsuariosService;
use App\Models\JWT\Payload;
use App\Models\StandardResponse;
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

    public function __construct(ArqUsuariosService $service)
    {
        $this->service = $service;
    }

    public function getToken(Request $request) {
        $response = new StandardResponse();
        $requestData = $request->all();
        try {
            $user = $this->service->validarExisteUsuario($requestData['usuario'], $requestData['contrasenia']);
        } catch (Exception $e) {

        }
        if ($user != null) {
            $payload = Payload::standard();
            
        }
        return response()->json($response, 200);
    }

}