<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\ArqPerfil;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\ArqPerfilList;
use Google\Cloud\Firestore\FirestoreClient;

class ArqPerfilesService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, ArqPerfil::path());
    }

    public function getById(string $id): ?ArqPerfil{
        $preresults = parent::getById($id);
        return $preresults != null ? new ArqPerfil($preresults): null;
    }

    /**
     * @return ArqPerfilList
     */
    public function getAll(): ArqPerfilList { 
        $results = new ArqPerfilList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqPerfil(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(ArqPerfil $objeto) : ArqPerfil {
        return parent::saveEntity($objeto);
    }

    public function delete(ArqPerfil $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

}