<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\Arquitectura\ArqPerfil;
use App\Models\Firebase\EntityService;
use Google\Cloud\Firestore\FirestoreClient;

class ArqPerfilesService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, ArqPerfil::path());
    }

    public function getById(string $id): ArqPerfil{
        $preresults = parent::getById($id);
        return new ArqPerfil(array_merge(['id' => array_key_first($preresults)], $preresults[array_key_first($preresults)]));
    }

    /**
     * @return array<ArqPerfil>
     */
    public function getAll(): array{
        $results = [];
        $preresults = parent::getAll();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqPerfil(array_merge(['id' => $key], $value));
           array_push($results, $objeto);
        }
        return $results;
    }

    public function save(ArqPerfil $objeto) : ArqPerfil {
        
        return parent::saveEntity($objeto);
    }

}