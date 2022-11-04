<?php

namespace App\Services\Firebase;

use App\Models\Firebase\Entities\ArqRolPerfil;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\ArqRolPerfilList;
use Google\Cloud\Firestore\FirestoreClient;

class ArqRolesPerfilesService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, ArqRolPerfil::path());
    }

    public function getById(string $id): ?ArqRolPerfil{
        $preresults = parent::getById($id);
        return $preresults != null ? new ArqRolPerfil($preresults) : null;
    }

    /**
     * @return ArqRolPerfilList
     */
    public function getAll(): ArqRolPerfilList { 
        $results = new ArqRolPerfilList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqRolPerfil(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(ArqRolPerfil $objeto) : ArqRolPerfil {
        return parent::saveEntity($objeto);
    }

    public function delete(ArqRolPerfil $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}