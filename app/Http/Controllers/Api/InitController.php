<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Firebase\Entities\ArqPerfil;
use App\Models\Firebase\Entities\ArqRol;
use App\Models\Firebase\Entities\ArqRolPerfil;
use App\Models\Firebase\Entities\ArqUsuario;
use App\Models\Firebase\Iterators\ArqPerfilList;
use App\Models\Firebase\Services\ArqPerfilesService;
use App\Models\Firebase\Services\ArqRolesPerfilesService;
use App\Models\Firebase\Services\ArqRolesService;
use App\Models\Firebase\Services\ArqUsuariosService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class InitController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private ArqUsuariosService $service1;
    private ArqPerfilesService $service2;
    private ArqRolesService $service3;
    private ArqRolesPerfilesService $service4;

    /**
     * Create a new controller instance.
     *
     * @param  ArqUsuariosService  $service
     * @return void
     */
    public function __construct(
        ArqUsuariosService $service1,
        ArqPerfilesService $service2,
        ArqRolesService $service3,
        ArqRolesPerfilesService $service4,
        Factory $factory,
    ) {
        $this->service1 = $service1;
        $this->service2 = $service2;
        $this->service3 = $service3;
        $this->service4 = $service4;
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
            "id" => 1,
            "nombre" => "ADMIN",
            "descripcion" => "Perfil con todas las capacidades del sistema",
            "activo" => true,
        ]);
        $this->service2->save($_1ap);
        $_1au = new ArqUsuario([
            "id" => 1,
            "usuario" => "1098731434",
            "contrasenia" => "8dIFT3taT1teOtoPfy1zL0",
            "perfil" => $_1ap,
            "activo" => true,
        ]);
        $this->service1->save($_1au);

        $_1ar = new ArqRol([
            "id" => 1,
            "nombre" => "ADMIN",
            "descripcion" => "Rol con todas las capacidades del sistema",
            "activo" => true
        ]);
        $this->service3->save($_1ar);

        $_1arp = new ArqRolPerfil([
            "id" => 1,
            "perfil" => $_1ap,
            "rol" => $_1ar,
            "activo" => true,
        ]);
        $this->service4->save($_1arp);

        return ["Data Insertada"];
    }

    public function redirecRest(Request $request) {
        $redirect = 'http://www.google.com';
        return redirect($redirect);
    }
}
