<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\Services\ArqUsuariosService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Kreait\Firebase\Factory;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

}