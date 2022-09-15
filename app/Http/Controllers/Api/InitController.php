<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\Arquitectura\ArqPerfil;
use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\Services\ArqPerfilesService;
use App\Models\Firebase\Services\ArqUsuariosService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Kreait\Firebase\Factory;

class InitController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private ArqUsuariosService $service1;
    private ArqPerfilesService $service2;

    /**
     * Create a new controller instance.
     *
     * @param  ArqUsuariosService  $service
     * @return void
     */
    public function __construct(
        ArqUsuariosService $service1,
        ArqPerfilesService $service2,
        Factory $factory,
    ) {
        $this->service1 = $service1;
        $this->service2 = $service2;
    }

    public function index() 
    {   
        // Ejemplo de consulta de registro por id
        //print json_encode($this->service1->getById('a'));

        // Ejemplo de consulta de todos los registros
        // print json_encode($this->service1->getAll());
        

        // Ejemplo de guardado de un registro
        //$first = new ArqUsuario(['usuario' => '1098123456', 'contrasenia' => '123456']);
        //$this->service1->save($first);
        //print json_encode($first);

        // Ejemplo de actualizacion de un registro
        // $first = $this->service1->getByKey('-NBcyH06zDdStUDLUdpu');
        // $last = clone $first;
        // $last->usuario = '1098123456';
        // $this->service1->save($last);



        return ["Bienvenido a Gestor de Invetario"];
    }

    public function seedData() {
        // USUARIOS
        $_1ap = new ArqPerfil([
            "nombre" => "ADMIN",
            "descripcion" => "Perfil con todas las capacidades del sistema",
            "activo" => true,
        ]);
        $this->service2->save($_1ap);
        $_1au = new ArqUsuario([
            "usuario" => "1098731434",
            "contrasenia" => "8dIFT3taT1teOtoPfy1zL0",
            "perfil" => $_1ap,
        ]);
        $this->service1->save($_1au);
    }

}
