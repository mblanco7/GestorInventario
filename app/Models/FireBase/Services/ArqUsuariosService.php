<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\ArqUsuario;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\ArqUsuarioList;
use App\Services\Md5Crypt;
use Google\Cloud\Firestore\FirestoreClient;

class ArqUsuariosService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, ArqUsuario::path());
    }

    public function getById(string $id): ?ArqUsuario{
        $preresults = parent::getById($id);
        return $preresults != null ? new ArqUsuario($preresults) : null;
    }

    /**
     * @return array<ArqUsuario>
     */
    public function getAll(): ArqUsuarioList{
        $results = new ArqUsuarioList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqUsuario($value);
            $results->add($objeto);
        }
        return $results;
    }

    public function save(ArqUsuario $objeto) : ArqUsuario {
        if ($objeto->id == null) {
            $password = $objeto->contrasenia;
            $password = Md5Crypt::crypt($password);
            if ($password != '') {
                $objeto->contrasenia = $password;
            }
        }
        return parent::saveEntity($objeto, ArqUsuario::path());
    }

    public function delete(ArqUsuario $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

    public function validarExisteUsuario(string $usuario, string $contrasenia): ArqUsuario|null {
        $password = Md5Crypt::crypt($contrasenia);
        $filas = $this->collection
            ->where('usuario', '=', $usuario)
            ->where('contrasenia', '=', $password)
            ->documents()->rows();
        $existe = sizeof($filas) > 0 ? $filas[0]->data() : null;
        $existe = $existe != null ? new ArqUsuario($existe) : null;
        return $existe;
    }

    public function getUsuarioPorNombre(string $usuario): ArqUsuario|null {
        $filas = $this->collection
            ->where('usuario', '=', $usuario)
            ->documents()->rows();
        $existe = sizeof($filas) > 0 ? $filas[0]->data() : null;
        $existe = $existe != null ? new ArqUsuario($existe) : null;
        return $existe;
    }
}