<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\Services\ArqUsuariosService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Kreait\Firebase\Factory;

class InitController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private ArqUsuariosService $service;

    /**
     * Create a new controller instance.
     *
     * @param  ArqUsuariosService  $service
     * @return void
     */
    public function __construct(ArqUsuariosService $service)
    {
        $this->service = $service;
    }

    public function index() 
    {
        // Ejemplo de consulta de registro por id
        //return $this->service->getById();

        // Ejemplo de consulta de todos los registros
        //return $this->service->getAll();

        // Ejemplo de guardado de un registro
        //$first = new ArqUsuario(['usuario' => '1098123456', 'contrasenia' => '123456']);
        //$this->service->save($first);
        //return $first;

        // Ejemplo de actualizacion de un registro
        // $first = $this->service->getByKey('-NBcyH06zDdStUDLUdpu');
        // $last = clone $first;
        // $last->usuario = '1098123456';
        // $this->service->save($last);
        
        return ["Bienvenido a Gestor de Invetario"];
    }

}
