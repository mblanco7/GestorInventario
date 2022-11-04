<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\ArqRol;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\ArqRolList;
use Google\Cloud\Firestore\FirestoreClient;

class ArqRolesService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, ArqRol::path());
    }

    public function getById(string $id): ?ArqRol{
        $preresults = parent::getById($id);
        return $preresults != null ? new ArqRol($preresults) : null;
    }

    /**
     * @return ArqRolList
     */
    public function getAll(): ArqRolList { 
        $results = new ArqRolList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new ArqRol(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(ArqRol $objeto) : ArqRol {
        return parent::saveEntity($objeto);
    }

    public function delete(ArqRol $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

}