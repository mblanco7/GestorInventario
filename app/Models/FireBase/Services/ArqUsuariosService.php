<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\Arquitectura\ArqUsuario;
use App\Models\Firebase\EntityService;
use Kreait\Firebase\Database;
use Kreait\Firebase\Factory;

class ArqUsuariosService extends EntityService{
 
    public function __construct(Factory $factory)
    {
       parent::__construct($factory, ArqUsuario::path());
    }

    public function getById(string $id): ArqUsuario{
        $preresults = parent::getById($id);
        return new ArqUsuario(array_merge(['id' => array_key_first($preresults)], $preresults[array_key_first($preresults)]));
    }

    public function getAll(): array{
        $results = [];
        $preresults = parent::getAll();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqUsuario(array_merge(['id' => $key], $value));
           array_push($results, $objeto);
        }
        return $results;
    }

    public function save(ArqUsuario $objeto) : ArqUsuario {
        return parent::saveEntity($objeto, ArqUsuario::path());
    }

}