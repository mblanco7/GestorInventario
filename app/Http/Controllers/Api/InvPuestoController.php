<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FireBase\Entities\InvPuesto;
use App\Services\FireBase\InvPuestosService;
use App\Models\StandardResponse;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Throwable;

class InvPuestoController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private InvPuestosService $service;

    public function __construct(InvPuestosService $service)
    {
        $this->service = $service;
    }

    function obtenerPorId(string $id) {
        if ($id != null) {
            $objeto = $this->service->getById($id);
            if ($objeto != null) return $this->return200($objeto);
            else return $this->returnMessage200("Identificador no encontrado");
        }
        return $this->returnMessage400("Debe ingresar un identificador valido");
    }

    function obtenerTodos() {
        $listado = $this->service->getAll();
        return $this->return200($listado);
    }

    function guardar(Request $request) {
        $response = new StandardResponse();
        $requestData = $request->all();
        $objeto = new InvPuesto($requestData);
        try {
            $objeto->id = null;
            $response->objeto = $this->service->save($objeto);
            $response->data = true;
            $response->mensaje = "Puesto almacenada satisfactoriamente";
            return $this->return200($response);
        } catch (Throwable $th) {
            $response->data = false;
            $response->mensaje = "Problemas al intentar almacenar la puesto. ".$th->getMessage();
            return $this->return500($response);
        }        
    }

    function actualizar(Request $request) {
        $response = new StandardResponse();
        $requestData = $request->all();
        $objeto = new InvPuesto($requestData);
        try {
            if ($objeto->id == null) throw new Exception("El objeto no contiene un valor de id");
            $old =  $this->service->getById($objeto->id);
            if ($old == null) throw new Exception("El id suministrado no existe como registro");
            $response->objeto = $this->service->save($objeto);
            $response->data = true;
            $response->mensaje = "Puesto actualizada satisfactoriamente";
            return $this->return200($response);
        } catch (Throwable $th) {
            $response->data = false;
            $response->mensaje = "Problemas al intentar actualizar la puesto. ".$th->getMessage();
            return $this->return500($response);
        }        
    }

    function borrar(Request $request) {
        $response = new StandardResponse();
        $requestData = $request->all();
        $objeto = new InvPuesto($requestData);
        try {
            if ($objeto->id == null) throw new Exception("El objeto no contiene un valor de id");
            $old =  $this->service->getById($objeto->id);
            if ($old == null) throw new Exception("El id suministrado no existe como registro");
            if ($this->service->delete($objeto)) {
                $response->data = true;
                $response->mensaje = "Puesto eliminada satisfactoriamente";
                return $this->return200($response);
            } else {
                throw new Exception();
            }
        } catch (Throwable $th) {
            $response->data = false;
            $response->mensaje = "Problemas al intentar borrar la puesto. ".$th->getMessage();
            return $this->return500($response);
        }
    }

}