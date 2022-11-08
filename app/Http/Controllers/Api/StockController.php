<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FireBase\Entities\InvKardex;
use App\Models\FireBase\Entities\InvStock;
use App\Models\FireBase\Iterators\InvKardexList;
use App\Models\FireBase\Iterators\InvStockList;
use App\Services\FireBase\InvKardexService;
use App\Services\FireBase\InvStockService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Throwable;

class ArqPerfilController extends Controller {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private InvStockService $invStockService;
    private InvKardexService $invKardexService; 

    public function __construct(
        InvStockService $invStockService,
        InvKardexService $invKardexService,
    ) {
        $this->invStockService = $invStockService;
        $this->invKardexService = $invKardexService;
    }

    /** Metodo que registra la entrada de una cantidad o cantidades de productos  
     * */
    public function registrarEntradaProductos(Request $request) {
        $requestData = $request->all();
        $listadoProductos = new InvStockList();
        $listadoKardex = new InvKardexList();
        // Valido las entradas de cada producto a registrar
        $validarAtributos = $this->validarAtributosStock($requestData, $listadoProductos);
        if ($validarAtributos != null) return $validarAtributos;
        // Acumulo los registros solo por producto para generar el registro de la entrada correspondiente
        $this->condensarProtuctosAEntradas($listadoProductos, $listadoKardex);
        // Almaceno los stocks
        foreach($listadoProductos as $stock) {
            try {
                $lastStock = $this->invStockService->obtenerStockPorStock($stock);
                if ($lastStock == null) {
                    $stock->activo = true;
                    $this->invStockService->save($stock);
                } else {
                    $lastStock->activo = false;
                    $stock->cantidad += $lastStock->cantidad;
                    $stock->valorUnitario = $lastStock->valorUnitario > $stock->valorUnitario ? $lastStock->valorUnitario :  $stock->valorUnitario;
                    $stock->activo = true;
                    $this->invStockService->save($lastStock);
                    $this->invStockService->save($stock);
                }
            } catch (Exception $ex) {
                $this->returnMessage500($ex->getMessage());
            } catch (Throwable $th) {
                $this->returnMessage500($th->getMessage());
            }
        }
        // Almaceno las entradas
        foreach($listadoKardex as $entrada) {
            $this->invKardexService->save($entrada);
        }
    }

    /**
     * Metodo encargado de validar que los atributos de los productos tipo stock tengan el minimo de datos necesarios
     */
    private function validarAtributosStock($requestData, $listadoProductos) {
        if (typeOf($requestData) != 'array') {
            return $this->returnMessage400("Los datos recibidos deben ser un arreglo de stock");
        }
        foreach($requestData as $key => $value) {
            $objeto = new InvStock($value);
            // Reviso datos de la entrada que sean completos
            if ($objeto->producto == null || $objeto->producto->id == null || $objeto->producto->id == '') {
                return $this->returnMessage400("El registro ".$key." no tiene producto asignado ");
            }
            if ($objeto->talla == null || $objeto->talla->id == null || $objeto->talla->id == '') {
                return $this->returnMessage400("Debe seleccionar la talla para el producto ".$objeto->producto->nombre." registro ".$key);
            }
            if ($objeto->color == null || $objeto->color->id == null || $objeto->color->id == '') {
                return $this->returnMessage400("Debe seleccionar el color para el producto ".$objeto->producto->nombre." registro ".$key);
            }
            if ($objeto->ubicacion == null || $objeto->ubicacion->id == null || $objeto->ubicacion->id == '') {
                return $this->returnMessage400("Debe asignar una ubicacion de bodega al producto ".$objeto->producto->nombre." registro ".$key);
            }
            $listadoProductos->add($objeto);
        }
        return null;
    }

    /** Metodo encargado de convertir el listado de productos tipo stock a listado de entradas de kardex */
    private function condensarProtuctosAEntradas(InvStockList $listadoProductos, InvKardexList $listadoKardex) {
        foreach($listadoProductos as $producto) {
            $nEntrada = new InvKardex();
            $nEntrada->producto = $producto->producto;
            $nEntrada->cantidad = 0;
            $nEntrada->valorUnitario = 0.0;
            $nEntrada->valorTotal = 0.0;
            foreach($listadoKardex as $entrada) {
                if ($entrada->producto->id == $producto->producto->id) {
                    $nEntrada = $entrada;
                    break;
                }
            }
            $cantidadAnterior = $nEntrada->cantidad;
            $valorAnterior = $nEntrada->valor;
            $cantidadNueva = $cantidadAnterior + $producto->cantidad;
            $valorNuevo = ($valorAnterior * $cantidadAnterior + $producto->cantidad * $producto->valorUnitario) / $cantidadNueva;
            $nEntrada->cantidad = $cantidadNueva;
            $nEntrada->valorUnitario = $valorNuevo;
            $nEntrada->valorTotal += $producto->cantidad * $producto->valorUnitario;
            $indice = $listadoKardex->indexOf($nEntrada);
            if ($indice > 0) {
                $listadoKardex->set($indice, $nEntrada);
            } else {
                $listadoKardex->add($nEntrada);
            }
        }
    }
}